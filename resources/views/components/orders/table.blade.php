<table class="table">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Order No</th>
            <th>User Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Created On</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody id="tbody">
        @forelse ($orders as $order)
            <tr>
                <td>
                    {{ $loop->iteration + $orders->firstItem() - 1 }}
                </td>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>
                    @foreach($order->orderItems as $item)
                        {{ $item->product->name }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach($order->orderItems as $item)
                        {{ $item->quantity }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach($order->orderItems as $item)
                        {{ $item->price }}<br>
                    @endforeach
                </td>
                <td>
                    @if ($order->status == 1)
                        <span class="badge badge-success">Pending</span>
                    @elseif ($order->status == 2)
                        <span class="badge badge-danger">Completed</span>
                    @else
                        <span class="badge badge-danger">Cancelled</span>
                    @endif
                </td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <form action="{{ route('admin.orders.destroy', $order->id) }}"
                            method="post" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <a class="confirm-text2 p-2" href="javascript:void(0);">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="7">No Order Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
<x-pagination :paginator="$orders" />