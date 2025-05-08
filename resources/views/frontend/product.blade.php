@extends('layouts.apps')

@section('content')
<!-- Creating a static subcategory product page for Men's Shirts with dynamic pagination and updated button/icon positions -->
<section id="subcategory" class="py-5">
    <div class="container">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4 animate__animated animate__fadeIn">
            <ol class="breadcrumb bg-white p-3 rounded shadow-sm">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Men</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shirts</li>
            </ol>
        </nav>

        <!-- Subcategory Title -->
        <h2 class="text-center mb-5 text-dark animate__animated animate__fadeIn">Shirts</h2>

        <!-- Product Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5 animate__animated animate__fadeIn animate__delay-1s" id="product-grid">
            <!-- Sample Product 1 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Classic Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Classic Shirt</h5>
                        <p class="card-text">$49.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 2 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Casual Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Casual Shirt</h5>
                        <p class="card-text">$54.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 3 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Formal Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Formal Shirt</h5>
                        <p class="card-text">$59.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 4 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Slim Fit Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Slim Fit Shirt</h5>
                        <p class="card-text">$52.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 5 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Checkered Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Checkered Shirt</h5>
                        <p class="card-text">$47.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 6 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Polo Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Polo Shirt</h5>
                        <p class="card-text">$45.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 7 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Denim Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Denim Shirt</h5>
                        <p class="card-text">$62.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 8 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Linen Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Linen Shirt</h5>
                        <p class="card-text">$57.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 9 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Printed Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Printed Shirt</h5>
                        <p class="card-text">$50.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 10 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Striped Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Striped Shirt</h5>
                        <p class="card-text">$53.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 11 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Oxford Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Oxford Shirt</h5>
                        <p class="card-text">$55.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 12 -->
            <div class="col product-item" data-page="1">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Flannel Shirt">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Flannel Shirt</h5>
                        <p class="card-text">$49.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 13 -->
            <div class="col product-item" data-page="2" style="display: none;">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Casual Shirt 2">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Casual Shirt 2</h5>
                        <p class="card-text">$51.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 14 -->
            <div class="col product-item" data-page="2" style="display: none;">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Formal Shirt 2">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Formal Shirt 2</h5>
                        <p class="card-text">$60.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 15 -->
            <div class="col product-item" data-page="2" style="display: none;">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Printed Shirt 2">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Printed Shirt 2</h5>
                        <p class="card-text">$48.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample Product 16 -->
            <div class="col product-item" data-page="2" style="display: none;">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="build/images/mens_product1.jpg" class="card-img-top" alt="Men's Linen Shirt 2">
                        <a href="#" class="details-icon" title="View Details">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Men's Linen Shirt 2</h5>
                        <p class="card-text">$58.99</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">Order Now</a>
                            <a href="#" class="wishlist-icon" title="Add to Wishlist">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="#" class="cart-icon" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end animate__animated animate__fadeIn animate__delay-2s">
            <nav aria-label="Page navigation">
                <ul class="pagination custom-pagination">
                    <li class="page-item" data-page="prev">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">« Prev</span>
                        </a>
                    </li>
                    <li class="page-item active" data-page="1"><a class="page-link" href="#">1</a></li>
                    <li class="page-item" data-page="2"><a class="page-link" href="#">2</a></li>
                    <li class="page-item" data-page="next">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">Next »</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

@push('scripts')
<!-- Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- jQuery for pagination -->
<script>
    $(document).ready(function () {
        // Initialize pagination
        function showPage(page) {
            // Hide all products
            $('.product-item').hide();

            // Show products for the selected page with animation
            $('.product-item[data-page="' + page + '"]').each(function (index) {
                $(this).delay(index * 100).fadeIn(300);
            });

            // Update pagination active state
            $('.page-item').removeClass('active');
            $('.page-item[data-page="' + page + '"]').addClass('active');

            // Update prev/next disabled state
            $('.page-item[data-page="prev"]').toggleClass('disabled', page === 1);
            $('.page-item[data-page="next"]').toggleClass('disabled', page === 2);
        }

        // Handle pagination clicks
        $('.page-item').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled') || $(this).hasClass('active')) return;

            let currentPage = parseInt($('.page-item.active').attr('data-page')) || 1;
            let targetPage;

            if ($(this).attr('data-page') === 'prev') {
                targetPage = currentPage - 1;
            } else if ($(this).attr('data-page') === 'next') {
                targetPage = currentPage + 1;
            } else {
                targetPage = parseInt($(this).attr('data-page'));
            }

            if (targetPage >= 1 && targetPage <= 2) {
                showPage(targetPage);
            }
        });

        // Show initial page
        showPage(1);
    });
</script>
@endpush
@endsection