@extends('layouts.apps')
@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Orders</h2>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-borderless align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-white fw-semibold">Order ID</th>
                            <th scope="col" class="text-white fw-semibold">Order Number</th>
                            <th scope="col" class="text-white fw-semibold">Product</th>
                            <th scope="col" class="text-white fw-semibold">Quantity</th>
                            <th scope="col" class="text-white fw-semibold">Price</th>
                            <th scope="col" class="text-white fw-semibold">Status</th>
                            <th scope="col" class="text-white fw-semibold">Date</th>
                            <th scope="col" class="text-white fw-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orderItems as $orderItem)
                            <tr>
                                <td>{{ $loop->iteration + $orderItems->firstItem() - 1 }}</td>
                                <td>{{ $orderItem->order->order_number }}</td>
                                <td>{{ $orderItem->product->name }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>${{ number_format($orderItem->product->price, 2) }}</td>
                                <td>
                                    @if($orderItem->order->status == 1)
                                        <span class="badge bg-warning text-dark rounded-pill">Pending</span>
                                    @elseif($orderItem->order->status == 2)
                                        <span class="badge bg-success rounded-pill">Delivered</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill">Canceled</span>
                                    @endif
                                </td>
                                <td>{{ $orderItem->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="#" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-end mt-4">
                {{ $orderItems->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection
