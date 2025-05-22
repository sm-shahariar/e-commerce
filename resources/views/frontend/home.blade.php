@extends('layouts.apps') 

@section('content')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay d-flex align-items-center">
            <div class="container text-white">
                <h1 class="display-4 fw-bold">Summer Sale is Live!</h1>
                <p class="lead">Up to 50% off on selected items. Limited time offer.</p>
                <a href="#" class="btn btn-primary btn-lg px-4 me-2">Shop Now</a>
                <a href="#" class="btn btn-outline-light btn-lg px-4">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Shop by Category</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top category-img" alt="Electronics">
                        <div class="card-body text-center">
                            <h5 class="card-title">Electronics</h5>
                            <a href="#" class="btn btn-outline-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top category-img" alt="Fashion">
                        <div class="card-body text-center">
                            <h5 class="card-title">Fashion</h5>
                            <a href="#" class="btn btn-outline-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top category-img" alt="Home & Garden">
                        <div class="card-body text-center">
                            <h5 class="card-title">Home & Garden</h5>
                            <a href="#" class="btn btn-outline-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80" class="card-img-top category-img" alt="Beauty">
                        <div class="card-body text-center">
                            <h5 class="card-title">Beauty</h5>
                            <a href="#" class="btn btn-outline-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2>Featured Products</h2>
                <a href="{{ url('products') }}" class="btn btn-outline-primary">View All</a>
            </div>
            <div class="row">
                <!-- Product 1 -->
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="action-icons">
                            <a href="{{ route('wishlist.store', $product->id) }}" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                            
                            <a href="{{ route('product.show',['slug' => $product->slug]) }}" title="Quick View"><i class="fas fa-eye"></i></a>
                        </div>
                        <img src="{{ $product->thumbnail }}" class="card-img-top product-img" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-danger">৳ {{ $product->variants->first()->price }}</span>
                                </div>
                                <form action="{{ route('cart.store', $product->id) }}" method="POST" class="cart-form" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="product_variant_id" value="{{ $product->variants->first()->id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-primary" title="Add to Cart">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </form>
                                <a href="#" class=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach    
               
            </div>
        </div>
    </section>

    <!-- Special Offer -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Limited Time Offer</h2>
                    <p class="lead">Get on your first order when you sign up for our newsletter.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Your email address">
                        <button class="btn btn-dark" type="button">Subscribe</button>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="img-fluid rounded" alt="Special Offer" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </section>

@endsection    
