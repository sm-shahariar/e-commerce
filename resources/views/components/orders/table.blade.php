<table class="table table-bordered">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Order No</th>
            <th>User Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Attribute</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="tbody">
        @forelse ($orders as $order)
            @php
                $orderLoop = $loop;
                $orderItemsCount = count($order->orderItems);
            @endphp
            @foreach ($order->orderItems as $item)
                <tr>
                    @if ($loop->first)
                        <td rowspan="{{ $orderItemsCount }}">
                            {{ $orderLoop->iteration + $orders->firstItem() - 1 }}
                        </td>
                        <td rowspan="{{ $orderItemsCount }}">
                            {{ $order->order_number }}
                        </td>
                        <td rowspan="{{ $orderItemsCount }}">
                            {{ $order->user->name }}
                        </td>
                    @endif

                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        @foreach ($item->variant->attributes as $attribute)
                            <span class="badge badge-pill badge-primary">{{ $attribute->attribute->name }} :
                                {{ $attribute->values->pluck('value.name')->implode(', ') }}</span><br>
                        @endforeach
                    </td>

                    @if ($loop->first)
                        <td rowspan="{{ $orderItemsCount }}">
                            @if (in_array($order->status, [1, 2, 4]))
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status"
                                        value="{{ $order->status == 1 ? 2 : ($order->status == 2 ? 4 : ($order->status == 4 ? 4 : 1)) }}">
                                    <button type="submit"
                                        class="badges status-badge px-1 py-2
                                        {{ $order->status == 1 ? 'bg-warning' : ($order->status == 2 ? 'bg-info' : 'bg-success') }}"
                                        style="border: none; background: none; padding: 0; cursor: pointer;">
                                        @if ($order->status == 1)
                                            Pending
                                        @elseif($order->status == 2)
                                            Processing
                                        @elseif($order->status == 4)
                                            Delivered
                                        @endif
                                    </button>
                                </form>
                            @elseif ($order->status == 3)
                                <span class="badges status-badge bg-danger">Canceled</span>
                            @endif

                        </td>
                        <td rowspan="{{ $orderItemsCount }}">
                            <div class="edit-delete-action">
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <a class="confirm-text2 p-2" href="javascript:void(0);">
                                        <i data-feather="trash-2" class="feather-trash-2"></i>
                                    </a>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        @empty
            <tr class="text-center">
                <td colspan="9">No Order Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
<x-pagination :paginator="$orders" />
