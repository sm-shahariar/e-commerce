@extends('layouts.apps')
@section('content')
    <!-- Product Listing Section -->
    <section class="py-5">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Products</li>
                </ol>
            </nav>

            <div class="row">
                <!-- Filters Sidebar -->
                <div class="col-md-3">
                    <div class="card filter-card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Filters</h5>
                            <hr>

                            <form action="">
                                <h6>Categories</h6>
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input name="category" @if(request('category') == $category->id) checked @endif class="form-check-input" value="{{ $category->id }}" type="radio" id="{{ $category->id }}">
                                        <label class="form-check-label" for="{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                                <hr>

                                <h6>Price Range</h6>

                                <div class="d-flex justify-content-between">
                                    <input name="min_price" type="number" class="form-control form-control-sm w-45" placeholder="Min"
                                        value="{{ request('min_price') ?? 1 }}">
                                    <input name="max_price" type="number" class="form-control form-control-sm w-45" placeholder="Max"
                                        value="{{ request('max_price') ?? 100000 }}">
                                </div>

                                <hr>

                                <h6>Sort By</h6>

                                <select name="sort" class="form-select form-select-sm">
                                    <option value="low">Price: Low to High</option>
                                    <option value="heigh">Price: High to Low</option>
                                    <option value="newest">Newest Arrivals</option>
                                    <option value="oldest">Oldest Arrivals</option>
                                </select>

                                <hr>

                                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-md-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>All Products</h4>
                        <div>
                            <span class="me-2">View:</span>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-secondary active"><i
                                        class="fas fa-th"></i></button>
                                <button type="button" class="btn btn-outline-secondary"><i
                                        class="fas fa-list"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Product 1 -->
                        @foreach ($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <span class="badge bg-success discount-badge " style="width:40px">new</span>
                                    <div class="action-icons">
                                        <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}"
                                            title="Quick View"><i class="fas fa-eye"></i></a>
                                    </div>
                                    <img src="{{ $product->thumbnail }}" class="card-img-top product-img" alt="Product 1">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text text-muted">{{ $product->description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="text-danger">{{ $product->price }}</span>
                                            </div>
                                            <form action="{{ route('cart.store', $product->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_variant_id" id="productVariantId" value="{{ $product->variants->first()->id }}">
                                                <button type="submit" id="addToCartBtn" class="btn btn-outline-primary">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
@endsection
