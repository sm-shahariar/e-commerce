@extends('layouts.apps')
@section('title', 'Home')
@section('content')
<!-- Creating the main content section with original sections and new Men’s, Women’s, Kids’ sections -->
<section id="main-content" class="py-5 bg-offwhite">
    <div class="container">
        <!-- Top Picks Section (Original) -->
        <div class="top-picks mb-5">
            <h2 class="text-center mb-4">Top Picks</h2>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-4 g-3">
                <!-- Product Card 1 -->
               @if ($products->count() == 0)
               <p class="font-weight-bold bg-primary text-white rounded-pill p-2 text-center" style="margin-left: 38%; margin-top: 40px;">No Product Found</p>
               @else
               @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <div class="card-img-wrapper position-relative">
                        <img src="{{ asset('build/images/product1.jpg') }}" class="card-img-top" alt="{{ $product->name }}">
                        <a href="{{ url('product-details/' . $product->id) }}" class="details-icon">
                            <i class="fas fa-info-circle">
                            </i></a>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="card-text">৳{{ $product->price }}</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="{{ route('product.order', $product->id) }}" class="btn btn-primary btn-xs">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               @endif
                <!-- Product Card 2 -->
            </div>
        </div>

        <!-- New Collection Section (Original) -->
        <div class="new-collection mb-5">
            <h2 class="text-center mb-4">New Collection</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @if ($newProducts->count() == 0)
                <p class="font-weight-bold bg-primary text-white rounded-pill p-2 text-center" style="margin-left: 38%; margin-top: 40px;">No Product Found</p>
                @else
                    @foreach ($newProducts as $newProduct)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-img-wrapper position-relative">
                                    <img src="{{ asset('build/images/product1.jpg') }}" class="card-img-top" alt="{{ $newProduct->name }}">
                                    <a href="#" class="details-icon" title="View Details">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $newProduct->name }}</h5>
                                    <p class="card-text">৳{{ $newProduct->price }}</p>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a href="{{ route('product.order', $newProduct->id) }}" class="btn btn-primary btn-sm">Order Now</a>
                                        <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Most Sold Products Section (Original) -->
        <div class="most-sold mb-5">
            <h2 class="text-center mb-4">Most Sold Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Product Card 1 -->
               @if ($mostSoldProducts->count() == 0)
               <p class="font-weight-bold bg-primary text-white rounded-pill p-2 text-center" style="margin-left: 38%; margin-top: 40px;">No Product Found</p>
               @else
               @foreach ($mostSoldProducts as $mostSoldProduct)
               <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product5.jpg" class="card-img-top" alt="Product 5">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $mostSoldProduct->name }}</h5>
                            <p class="card-text">৳{{ $mostSoldProduct->price }}</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="{{ route('product.order', $mostSoldProduct->id) }}" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
               @endif
                
            </div>
        </div>

        <!-- Men’s Products Section (New) -->
        <div class="mens-products mb-5">
            <h2 class="text-center mb-4">Men’s Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Men’s Product 1 -->
                @if ($menProducts->count() == 0)
                <p class="font-weight-bold bg-primary text-white rounded-pill p-2 text-center" style="margin-left: 38%; margin-top: 40px;">No Product Found</p>
                @else
                    @foreach ($menProducts as $menProduct)
                    <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men’s Shirt 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $menProduct->name }}</h5>
                            <p class="card-text">৳{{ $menProduct->price }}</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="{{ route('product.order', $menProduct->id) }}" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Women’s Products Section (New) -->
        <div class="womens-products mb-5">
            <h2 class="text-center mb-4">Women’s Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Women’s Product 1 -->
                @if ($womenProducts->count() == 0)
                <p class="font-weight-bold bg-primary text-white rounded-pill p-2 text-center" style="margin-left: 38%; margin-top: 40px;">No Product Found</p>
                @else
                @foreach ($womenProducts as $womenProduct)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/womens_product1.jpg" class="card-img-top" alt="Women’s Dress 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $womenProduct->name }}</h5>
                            <p class="card-text">৳{{ $womenProduct->price }}</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="{{ route('product.order', $womenProduct->id) }}" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Kids’ Products Section (New) -->
        <div class="kids-products mb-5">
            <h2 class="text-center mb-4">Kids’ Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Kids’ Product 1 -->
                @if ($kidProducts->count() == 0)
                    <p class="font-weight-bold bg-primary text-white rounded-pill p-2 text-center" style="margin-left: 38%; margin-top: 40px;">No Product Found</p>
                @else
                    @foreach ($kidProducts as $kidProduct)
                    <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/kids_product1.jpg" class="card-img-top" alt="Kids’ T-Shirt 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $kidProduct->name }}</h5>
                            <p class="card-text">৳{{ $kidProduct->price }}</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="{{ route('product.order', $kidProduct->id) }}" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection