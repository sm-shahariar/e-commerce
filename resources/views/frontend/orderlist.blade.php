@extends('layouts.apps')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Order Management</h2>
                        <div class="d-flex">
                            <input type="text" class="form-control me-2" placeholder="Search orders...">
                            <button class="btn btn-primary">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive rounded-3">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3 px-4 text-start">SL</th>
                                        <th class="py-3 px-4 text-start">Order No</th>
                                        <th class="py-3 px-4 text-start">Customer</th>
                                        <th class="py-3 px-4 text-start">Product</th>
                                        <th class="py-3 px-4 text-end">Qty</th>
                                        <th class="py-3 px-4 text-end">Price</th>
                                        <th class="py-3 px-4 text-start">Attributes</th>
                                        <th class="py-3 px-4 text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    @forelse ($orders as $order)
                                        @php
                                            $orderLoop = $loop;
                                            $orderItemsCount = count($order->orderItems);
                                        @endphp
                                        @foreach ($order->orderItems as $item)
                                            <tr class="border-bottom">
                                                @if ($loop->first)
                                                    <td class="py-3 px-4 align-top" rowspan="{{ $orderItemsCount }}">
                                                        <span class="fw-medium">{{ $orderLoop->iteration }}</span>
                                                    </td>
                                                    <td class="py-3 px-4 align-top" rowspan="{{ $orderItemsCount }}">
                                                        <span
                                                            class="text-primary fw-medium">#{{ $order->order_number }}</span>
                                                    </td>
                                                    <td class="py-3 px-4 align-top" rowspan="{{ $orderItemsCount }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-3">
                                                                <p class="mb-0 fw-medium">{{ $order->user->name ?? 'N/A' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif

                                                <td class="py-3 px-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-3">
                                                            <p class="mb-0 fw-medium">{{ $item->product->name ?? 'N/A' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-4 text-end">{{ $item->quantity }}</td>
                                                <td class="py-3 px-4 text-end">${{ number_format($item->price, 2) }}</td>
                                                <td class="py-3 px-4">
                                                    @if ($item->variant && $item->variant->attributes->count())
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach ($item->variant->attributes as $attribute)
                                                                <span class="badge bg-light text-dark border">
                                                                    {{ $attribute->attribute->name ?? '' }}:
                                                                    {{ $attribute->values->pluck('value.name')->implode(', ') }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>

                                                @if ($loop->first)
                                                    <td class="py-3 px-4 align-middle text-center"
                                                        rowspan="{{ $orderItemsCount }}">
                                                        @if ($order->status == 1)
                                                            {{-- Allow canceling if order is pending --}}
                                                            <form
                                                                action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="status" value="3">
                                                                <button type="submit"
                                                                    class="badges status-badge bg-warning text-white rounded"
                                                                    style="border: none; background: none; padding: 5px 3px; cursor: pointer;">
                                                                    Pending (Click to Cancel Order)
                                                                </button>
                                                            </form>
                                                        @elseif ($order->status == 2)
                                                            <span class="badges status-badge bg-info text-white px-2 py-2 rounded">Processing</span>
                                                        @elseif ($order->status == 4)
                                                            <span class="badges status-badge bg-success text-white px-2 py-2 rounded">Delivered</span>
                                                        @elseif ($order->status == 3)
                                                            <span class="badges status-badge bg-danger text-white px-2 py-2 rounded">Canceled</span>
                                                        @endif

                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="8" class="py-4 text-center text-muted">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-box-open fs-1 text-muted mb-2"></i>
                                                    <p class="mb-0">No orders found</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($orders->hasPages())
                            <div class="card-footer border-top py-3">
                                <div class="d-flex justify-content-center">
                                    {{ $orders->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
