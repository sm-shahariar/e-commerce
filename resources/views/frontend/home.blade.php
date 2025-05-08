@extends('layouts.apps')
@section('content')
<!-- Creating the main content section with original sections and new Men’s, Women’s, Kids’ sections -->
<section id="main-content" class="py-5 bg-offwhite">
    <div class="container">
        <!-- Top Picks Section (Original) -->
        <div class="top-picks mb-5">
            <h2 class="text-center mb-4">Top Picks</h2>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-4 g-3">
                <!-- Product Card 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm small-card">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product1.jpg" class="card-img-top" alt="Top Pick 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 1</h6>
                            <p class="card-text">$24.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-xs">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product2.jpg" class="card-img-top" alt="Top Pick 2">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 2</h6>
                            <p class="card-text">$29.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-xs">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product3.jpg" class="card-img-top" alt="Top Pick 3">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 3</h6>
                            <p class="card-text">$19.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-xs">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product4.jpg" class="card-img-top" alt="Top Pick 4">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">Top Pick 4</h6>
                            <p class="card-text">$34.99</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-primary btn-xs" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-xs">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Collection Section (Original) -->
        <div class="new-collection mb-5">
            <h2 class="text-center mb-4">New Collection</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Product Card 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product1.jpg" class="card-img-top" alt="Product 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 1</h5>
                            <p class="card-text">$49.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product2.jpg" class="card-img-top" alt="Product 2">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 2</h5>
                            <p class="card-text">$59.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product3.jpg" class="card-img-top" alt="Product 3">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 3</h5>
                            <p class="card-text">$39.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product4.jpg" class="card-img-top" alt="Product 4">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Product Name 4</h5>
                            <p class="card-text">$69.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Most Sold Products Section (Original) -->
        <div class="most-sold mb-5">
            <h2 class="text-center mb-4">Most Sold Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Product Card 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product5.jpg" class="card-img-top" alt="Product 5">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 1</h5>
                            <p class="card-text">$29.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product6.jpg" class="card-img-top" alt="Product 6">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 2</h5>
                            <p class="card-text">$79.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product7.jpg" class="card-img-top" alt="Product 7">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 3</h5>
                            <p class="card-text">$99.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
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
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/product8.jpg" class="card-img-top" alt="Product 8">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Best Seller 4</h5>
                            <p class="card-text">$19.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Men’s Products Section (New) -->
        <div class="mens-products mb-5">
            <h2 class="text-center mb-4">Men’s Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Men’s Product 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men’s Shirt 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Men’s Classic Shirt</h5>
                            <p class="card-text">$49.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Men’s Product 2 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/mens_product2.jpg" class="card-img-top" alt="Men’s Jacket 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Men’s Leather Jacket</h5>
                            <p class="card-text">$89.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Men’s Product 3 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/mens_product3.jpg" class="card-img-top" alt="Men’s T-Shirt 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Men’s Casual T-Shirt</h5>
                            <p class="card-text">$24.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Men’s Product 4 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/mens_product4.jpg" class="card-img-top" alt="Men’s Jeans 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Men’s Slim Jeans</h5>
                            <p class="card-text">$59.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Women’s Products Section (New) -->
        <div class="womens-products mb-5">
            <h2 class="text-center mb-4">Women’s Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Women’s Product 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/womens_product1.jpg" class="card-img-top" alt="Women’s Dress 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Women’s Summer Dress</h5>
                            <p class="card-text">$69.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Women’s Product 2 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/womens_product2.jpg" class="card-img-top" alt="Women’s Top 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Women’s Casual Top</h5>
                            <p class="card-text">$39.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Women’s Product 3 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/womens_product3.jpg" class="card-img-top" alt="Women’s Skirt 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Women’s A-Line Skirt</h5>
                            <p class="card-text">$49.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Women’s Product 4 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/womens_product4.jpg" class="card-img-top" alt="Women’s Jacket 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Women’s Denim Jacket</h5>
                            <p class="card-text">$79.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kids’ Products Section (New) -->
        <div class="kids-products mb-5">
            <h2 class="text-center mb-4">Kids’ Products</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <!-- Kids’ Product 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/kids_product1.jpg" class="card-img-top" alt="Kids’ T-Shirt 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Kids’ Graphic T-Shirt</h5>
                            <p class="card-text">$19.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kids’ Product 2 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/kids_product2.jpg" class="card-img-top" alt="Kids’ Jacket 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Kids’ Hooded Jacket</h5>
                            <p class="card-text">$39.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kids’ Product 3 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/kids_product3.jpg" class="card-img-top" alt="Kids’ Shorts 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Kids’ Cargo Shorts</h5>
                            <p class="card-text">$29.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kids’ Product 4 -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-wrapper position-relative">
                            <img src="build/images/kids_product4.jpg" class="card-img-top" alt="Kids’ Dress 1">
                            <a href="#" class="details-icon" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Kids’ Party Dress</h5>
                            <p class="card-text">$49.99</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm">Order Now</a>
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