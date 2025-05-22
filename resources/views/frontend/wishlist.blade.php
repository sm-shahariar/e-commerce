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
                        <i class="fas fa-gift me-2"></i> 5 Items
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
                    <button class="btn btn-outline-secondary">On Sale</button>
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
            <div class="col-lg-4 col-md-6">
                <div class="card wishlist-card">
                    <img src="https://via.placeholder.com/300x200?text=Product+1" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <div class="wishlist-actions">
                            <button class="btn btn-danger btn-sm mb-2" title="Remove">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-primary btn-sm" title="Add to Cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                        <h5 class="card-title">Wireless Bluetooth Headphones</h5>
                        <p class="card-text text-muted">Premium noise cancelling headphones with 30hr battery life</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">$129.99</span>
                            <span class="badge bg-success">In Stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
