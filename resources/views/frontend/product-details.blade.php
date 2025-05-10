@extends('layouts.apps')
@section('content')
<!-- Creating the product details page with enhanced aesthetics -->
<section id="product-details" class="py-5">
    <div class="container">
        <div class="row p-4">
            <!-- Left Side: Main Image and Thumbnails -->
            <div class="col-lg-6 mb-4">
                <div class="main-image mb-4 position-relative overflow-hidden rounded">
                    <img src="{{ $product->thumbnail }}" class="img-fluid shadow-sm" alt="Product Main Image" id="mainImage">
                </div>
                <div class="thumbnail-images d-flex gap-3 justify-content-center">
                    @foreach($product->images as $image)
                    <img src="{{ $product->image }}" class="thumbnail rounded shadow-sm active" alt="">
                    <img src="{{ $product->image }}" class="thumbnail rounded shadow-sm" alt="">
                    <img src="{{ $product->image }}" class="thumbnail rounded shadow-sm" alt="">
                    @endforeach
                </div>
            </div>

            <!-- Right Side: Product Details -->
            <div class="col-lg-6">
                <h2 class="product-title mb-3 text-dark">{{ $product->name }}</h2>
                <p class="product-price mb-4 text-primary fs-3 fw-bold">
                     ৳{{
                            $variants->isNotEmpty() && $variants->first()->productVariant
                                ? $variants->first()->productVariant->price
                                : ($product->price ?? '0.00')
                        }}
                </p>

                <!-- Variant Selection: Color -->
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Color</label>
                    <div class="d-flex gap-2 flex-wrap">
                        @if(isset($groupedVariants['color']) && $groupedVariants['color']->isNotEmpty())
                            @foreach($groupedVariants['color'] as $variant)
                                <input 
                                    type="radio" 
                                    name="color" 
                                    id="color{{ str_replace(' ', '', $variant->productAttributeValue->value) }}" 
                                    value="{{ strtolower($variant->productAttributeValue->value) }}" 
                                    class="d-none">
                                <label 
                                    for="color{{ str_replace(' ', '', $variant->productAttributeValue->value) }}" 
                                    class="variant-btn btn btn-outline-primary">
                                    {{ $variant->productAttributeValue->value }}
                                </label>
                            @endforeach
                        @else
                            <p>No color variants available.</p>
                        @endif
                    </div>
                </div>

                <!-- Variant Selection: Size -->
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Size</label>
                    <div class="d-flex gap-2 flex-wrap">
                        @if(isset($groupedVariants['size']) && $groupedVariants['size']->isNotEmpty())
                            @foreach($groupedVariants['size'] as $variant)
                                <input 
                                    type="radio" 
                                    name="size" 
                                    id="size{{ str_replace(' ', '', $variant->productAttributeValue->value) }}" 
                                    value="{{ strtolower($variant->productAttributeValue->value) }}" 
                                    class="d-none"
                                >
                                <label 
                                    for="size{{ str_replace(' ', '', $variant->productAttributeValue->value) }}" 
                                    class="variant-btn btn btn-outline-primary"
                                >
                                    {{ $variant->productAttributeValue->value }}
                                </label>
                            @endforeach
                        @else
                            <p>No size variants available.</p>
                        @endif
                    </div>
                </div>

                <!-- Product Details -->
                <div class="product-details mb-5">
                    <h4 class="fw-bold mb-3 text-dark">Product Details</h4>
                    <p class="text-muted">{{ $product->description }}</p>
                    <!-- <ul class="list-unstyled">
                        <li class="mb-2"><i class="fa fa-check-circle text-primary me-2"></i>Material: 100% Cotton</li>
                        <li class="mb-2"><i class="fa fa-check-circle text-primary me-2"></i>Fit: Regular</li>
                        <li class="mb-2"><i class="fa fa-check-circle text-primary me-2"></i>Care: Machine Washable</li>
                        <li><i class="fa fa-check-circle text-primary me-2"></i>Made in: USA</li>
                    </ul> -->
                </div>

                <!-- Order Now Button -->
                <div class="order-now">
                    <a href="{{ route('product.order', $product->id) }}" class="btn btn-primary btn-lg glow-btn">Order Now</a>
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