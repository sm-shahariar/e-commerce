@extends('layouts.apps')

@section('content')
   <!-- Creating the main content section with Top Picks, New Collection, and Most Sold Products -->
<section id="main-content" class="py-5 bg-offwhite">
    <div class="container">
        <!-- Top Picks Section -->
        <div class="top-picks mb-5">
            <h2 class="text-center mb-4">Top Picks</h2>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-4 g-3">
                <!-- Product Card 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product1.jpg" class="card-img-top" alt="Top Pick 1">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 1</h6>
                            <p class="card-text">$24.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 2 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product2.jpg" class="card-img-top" alt="Top Pick 2">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 2</h6>
                            <p class="card-text">$29.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 3 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product3.jpg" class="card-img-top" alt="Top Pick 3">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 3</h6>
                            <p class="card-text">$19.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 4 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product4.jpg" class="card-img-top" alt="Top Pick 4">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 4</h6>
                            <p class="card-text">$34.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 5 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product5.jpg" class="card-img-top" alt="Top Pick 5">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 5</h6>
                            <p class="card-text">$44.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 6 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product6.jpg" class="card-img-top" alt="Top Pick 6">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 6</h6>
                            <p class="card-text">$39.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 7 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product7.jpg" class="card-img-top" alt="Top Pick 7">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 7</h6>
                            <p class="card-text">$49.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 8 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <img src="build/images/product8.jpg" class="card-img-top" alt="Top Pick 8">
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 8</h6>
                            <p class="card-text">$54.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Collection Section -->
        <div class="new-collection mb-5">
            <h2 class="text-center mb-4">New Collection</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Product Card 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product1.jpg" class="card-img-top" alt="Product 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 1</h5>
                            <p class="card-text">$49.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 2 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product2.jpg" class="card-img-top" alt="Product 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 2</h5>
                            <p class="card-text">$59.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 3 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product3.jpg" class="card-img-top" alt="Product 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 3</h5>
                            <p class="card-text">$39.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 4 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product4.jpg" class="card-img-top" alt="Product 4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 4</h5>
                            <p class="card-text">$69.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Most Sold Products Section -->
        <div class="most-sold">
            <h2 class="text-center mb-4">Most Sold Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Product Card 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product5.jpg" class="card-img-top" alt="Product 5">
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 1</h5>
                            <p class="card-text">$29.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 2 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product6.jpg" class="card-img-top" alt="Product 6">
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 2</h5>
                            <p class="card-text">$79.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 3 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product7.jpg" class="card-img-top" alt="Product 7">
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 3</h5>
                            <p class="card-text">$99.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 4 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="build/images/product8.jpg" class="card-img-top" alt="Product 8">
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 4</h5>
                            <p class="card-text">$19.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection