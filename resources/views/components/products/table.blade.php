<table class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>Product</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Slug</th>
            <th>Stock</th>
            <th>Price</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration + $products->firstItem() - 1 }}</td>
                <td>
                    <div class="productimgname">
                        <a href="javascript:void(0);" class="product-img stock-img">
                            <img src="{{ $product->thumbnail ?: asset('build/img/no-image.svg') }}"
                                alt="product">
                        </a>
                        <a href="javascript:void(0);">{{ $product->name }}</a>
                    </div>
                </td>
                <td>{{ $product->category?->name }}</td>
                <td>{{ $product->subCategory?->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->stock }}</td>
                <td>৳ {{ $product->price }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 edit-icon  p-2" href="{{ url('product-details') }}"
                            data-bs-toggle="modal" data-bs-target="#products-{{ $product->id }}">
                            <i data-feather="eye" class="feather-eye"></i>
                        </a>
                        <a class="me-2 p-2" href="{{ route('admin.products.edit', $product->id) }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}"
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
            <div class="modal fade" id="products-{{ $product->id }}" tabindex="-1"
                aria-labelledby="productDetailsLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content shadow-lg rounded-3"
                        style="width: 90vw; max-width: 1200px; height: 95vh;">
                        <div
                            class="modal-header bg-white text-dark border-0 rounded-top d-flex align-items-center justify-content-between">
                            <h5 class="modal-title me-3" id="productDetailsLabel">Product Details
                            </h5>
                            <button type="button" class="close border-0" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-4" style="max-height: 90vh; overflow-y: auto;">
                            <div class="d-flex flex-column flex-md-row align-items-center mb-4">
                                <div class="me-md-4 mb-3 mb-md-0 text-center">
                                    <img src="{{ asset('build/img/no-image.svg') }}"
                                        alt="product" class="img-fluid rounded"
                                        style="max-height: 200px;">
                                </div>
                                <div>
                                    <h3 class="fw-bold mb-2">{{ $product->name }}</h3>
                                    <p class="text-muted mb-2"><strong>Category:</strong>
                                        {{ $product->category?->name }}</p>
                                    <p class="text-muted mb-2"><strong>Brand:</strong>
                                        {{ $product->subCategory?->name }}</p>
                                    <p class="text-muted mb-2"><strong></strong>
                                        <span>
                                            
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-4 mb-4">
                                <div class="p-4 border rounded shadow-sm flex-grow-1 bg-light">
                                    <h5 class="fw-bold mb-2">Stock</h5>
                                    <p class="text-primary fs-4 fw-bold">
                                        {{ number_format($product->stock) }}</p>
                                </div>
                                <div class="p-4 border rounded shadow-sm flex-grow-1 bg-light">
                                    <h5 class="fw-bold mb-2">Price</h5>
                                    <p class="text-success fs-4 fw-bold">
                                        {{ number_format($product->price) }}</p>
                                </div>
                            </div>
                            <!-- Inventory Locations Section -->
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <tr class="text-center">
            <td colspan="7">No Product Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
<x-pagination :paginator="$products" />