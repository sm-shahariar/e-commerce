@extends('layouts.apps')

@section('content')
    <!-- Header -->
    <header class="wishlist-header py-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4 fw-bold"><i class="fas fa-heart me-3"></i>My Wishlist</h1>
                    <p class="lead">Your saved items for later</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-light text-dark fs-5 p-3">
                        <i class="fas fa-gift me-2"></i> {{ \App\Services\WishlistService::getCount() }} Items
                    </span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mb-5">
        <!-- Filter/Sort Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="filter-buttons">
                    <button class="btn btn-outline-primary active">All Items</button>
                    {{-- <button class="btn btn-outline-secondary">On Sale</button> --}}
                    <button class="btn btn-outline-success">In Stock</button>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="dropdown d-inline-block">
                    <button class="btn btn-light dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sort by: Recently Added
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#">Recently Added</a></li>
                        <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                        <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                        <li><a class="dropdown-item" href="#">Alphabetical</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Wishlist Items -->
        <div class="row">
            <!-- Item 1 -->
            @if (!empty($wishlists))
                @foreach ($wishlists as $wishlist)
                    <div class="col-lg-4 col-md-6">
                        <div class="card wishlist-card">
                            <img src="{{ $wishlist->product->thumbnail }}" class="card-img-top" alt="thumbnail">
                            <div class="card-body">
                                <div class="wishlist-actions" style="margin-top:65px;">
                                    <form action="{{ route('cart.store', $wishlist->product->id) }}" method="POST"
                                        class="cart-form" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="product_variant_id"
                                            value="{{ $wishlist->product->variants->first()->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-primary" title="Add to Cart">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                                <h5 class="card-title">{{ $wishlist->product->name }}</h5>
                                <p class="card-text text-muted">{{ $wishlist->product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">৳ {{ $wishlist->product->price }}</span>
                                    <span class="badge bg-success" style="position:absolute; bottom:20px; left:260px">
                                        @php
                                            $inStock = $wishlist->product->variants->contains(function ($variant) {
                                                return $variant->qty > 0;
                                            });
                                        @endphp
                                        @if ($wishlist->product->variants->count() > 0)
                                            @if ($inStock)
                                                <span class="badge bg-success">In Stock</span>
                                            @else
                                                <span class="badge bg-danger">Out of Stock</span>
                                            @endif
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <form action="{{ route('wishlist.destroy')}}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-outline-primary mb-2" title="Remove">
                <span class="me-2 fs-5">Remove All Your Wishlist</span>
                <i class="fas fa-trash fs-5"></i>
            </button>
        </form>
    </div>
@endsection
