<table class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sku</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($productVariants as $productVariant)
            <tr>
                <td>{{ $loop->iteration + $productVariants->firstItem() - 1 }}</td>
                <td>
                    <div class="productimgname">
                        <a href="javascript:void(0);" class="product-img stock-img">
                            <img src="{{ $productVariant->product->thumbnail ?: asset('build/img/no-image.svg') }}"
                                alt="product">
                        </a>
                        <a href="javascript:void(0);">{{ $productVariant->product->name }}</a>
                    </div>
                </td>
                <td>{{ $productVariant->sku }}</td>
                <td>৳ {{ $productVariant->price }}</td>
                <td>{{ $productVariant->qty }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 edit-icon  p-2" href="#"
                            data-bs-toggle="modal" data-bs-target="#productVariants-{{ $productVariant->id }}">
                            <i data-feather="eye" class="feather-eye"></i>
                        </a>
                        <a class="me-2 p-2" href="{{ route('admin.product-variants.edit', $productVariant->id) }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('admin.product-variants.destroy', $productVariant->id) }}"
                            class="delete-form" method="post">
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
            <td colspan="7">No Product Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
<x-pagination :paginator="$productVariants" />