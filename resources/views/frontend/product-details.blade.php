@extends('layouts.apps')

@section('content')
<!-- Creating the product details page with enhanced aesthetics -->
<section id="product-details" class="py-5">
    <div class="container">
        <div class="row p-4">
            <!-- Left Side: Main Image and Thumbnails -->
            <div class="col-lg-6 mb-4">
                <div class="main-image mb-4 position-relative overflow-hidden rounded">
                    <img src="build/images/product1.jpg" class="img-fluid shadow-sm" alt="Product Main Image" id="mainImage">
                </div>
                <div class="thumbnail-images d-flex gap-3 justify-content-center">
                    <img src="build/images/product1.jpg" class="thumbnail rounded shadow-sm active" alt="Thumbnail 1" data-image="build/images/product1.jpg">
                    <img src="build/images/product2.jpg" class="thumbnail rounded shadow-sm" alt="Thumbnail 2" data-image="build/images/product2.jpg">
                    <img src="build/images/product3.jpg" class="thumbnail rounded shadow-sm" alt="Thumbnail 3" data-image="build/images/product3.jpg">
                </div>
            </div>

            <!-- Right Side: Product Details -->
            <div class="col-lg-6">
                <h2 class="product-title mb-3 text-dark">Product Name</h2>
                <p class="product-price mb-4 text-primary fs-3 fw-bold">$49.99</p>

                <!-- Variant Selection: Color -->
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Color</label>
                    <div class="d-flex gap-2 flex-wrap">
                        <input type="radio" name="color" id="colorRed" value="red" class="d-none">
                        <label for="colorRed" class="variant-btn btn btn-outline-primary">Red</label>
                        <input type="radio" name="color" id="colorBlue" value="blue" class="d-none">
                        <label for="colorBlue" class="variant-btn btn btn-outline-primary">Blue</label>
                        <input type="radio" name="color" id="colorBlack" value="black" class="d-none">
                        <label for="colorBlack" class="variant-btn btn btn-outline-primary">Black</label>
                        <input type="radio" name="color" id="colorWhite" value="white" class="d-none">
                        <label for="colorWhite" class="variant-btn btn btn-outline-primary">White</label>
                    </div>
                </div>

                <!-- Variant Selection: Size -->
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Size</label>
                    <div class="d-flex gap-2 flex-wrap">
                        <input type="radio" name="size" id="sizeS" value="s" class="d-none">
                        <label for="sizeS" class="variant-btn btn btn-outline-primary">Small</label>
                        <input type="radio" name="size" id="sizeM" value="m" class="d-none">
                        <label for="sizeM" class="variant-btn btn btn-outline-primary">Medium</label>
                        <input type="radio" name="size" id="sizeL" value="l" class="d-none">
                        <label for="sizeL" class="variant-btn btn btn-outline-primary">Large</label>
                        <input type="radio" name="size" id="sizeXL" value="xl" class="d-none">
                        <label for="sizeXL" class="variant-btn btn btn-outline-primary">Extra Large</label>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="product-details mb-5">
                    <h4 class="fw-bold mb-3 text-dark">Product Details</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fa fa-check-circle text-primary me-2"></i>Material: 100% Cotton</li>
                        <li class="mb-2"><i class="fa fa-check-circle text-primary me-2"></i>Fit: Regular</li>
                        <li class="mb-2"><i class="fa fa-check-circle text-primary me-2"></i>Care: Machine Washable</li>
                        <li><i class="fa fa-check-circle text-primary me-2"></i>Made in: USA</li>
                    </ul>
                </div>

                <!-- Order Now Button -->
                <div class="order-now">
                    <a href="#" class="btn btn-primary btn-lg glow-btn">Order Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function () {
        // Handle thumbnail click
        $('.thumbnail').on('click', function () {
            // Update main image source
            $('#mainImage').attr('src', $(this).data('image'));

            // Remove active class from all thumbnails
            $('.thumbnail').removeClass('active');

            // Add active class to clicked thumbnail
            $(this).addClass('active');
        });

        // Set first thumbnail as active by default
        $('.thumbnail').first().addClass('active');

        // Handle variant button click for color and size
        $('.variant-btn').on('click', function () {
            // Remove active class from all buttons in the same group
            $(this).siblings('.variant-btn').removeClass('active');
            // Add active class to clicked button
            $(this).addClass('active');
        });
    });
</script>
@endpush
@endsection