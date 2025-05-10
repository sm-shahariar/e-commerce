@extends('layouts.apps')
@section('content')

<section id="order-section" class="py-5 position-relative overflow-hidden">
    <div class="container">
        <!-- Radial Gradient Overlay -->
        <div class="profile-bg-overlay"></div>

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('sub-products') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order</li>
            </ol>
        </nav>

        <!-- Order Title -->
        <h2 class="text-center mb-5">Place Your Order</h2>

        <div class="row justify-content-center">
            <!-- Product Selection -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h4 class="card-title mb-0 text-white">Product Details</h4>
                    </div>
                    <div class="card-body">
                        <!-- Product Thumbnail -->
                    <div class="card-img-wrapper text-center mb-4">
                       
                        <img src="{{ $product->thumbnail }}" alt="" class="card-img-top">
                        <!-- <a href="{{ route('product.details', $product->id) }}" class="details-icon"><i class="fas fa-info-circle"></i></a> -->
                    </div>
                    <!-- Product Name -->
                    <h5 class="card-title text-center mb-3">{{ ($product->name) }}</h5>

                        <!-- Color Selection -->
                        @if(is_array($groupedVariants) ? array_key_exists('color', $groupedVariants) : $groupedVariants->has('color'))
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-palette me-2"></i>Select Color</label>
                            <div class="d-flex gap-2">
                            @foreach($groupedVariants['color'] as $variant)
                                <button type="button" class="color-swatch {{ $loop->first ? 'active' : '' }}"
                                        data-color="{{ $variant->productAttributeValue->value }}"
                                        title="{{ $variant->productAttributeValue->value }}"
                                        style="background-color: {{ $variant->productAttributeValue->value }};">
                                </button>
                            @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Size Selection -->
                    @if(is_array($groupedVariants) ? array_key_exists('size', $groupedVariants) : $groupedVariants->has('size'))
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-ruler me-2"></i>Select Size</label>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach($groupedVariants['size'] as $variant)
                                    <button type="button" class="variant-btn {{ $loop->first ? 'active' : '' }}" 
                                            data-size="{{ $variant->productAttributeValue->value }}">
                                        {{ $variant->productAttributeValue->value }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif

                        <!-- Quantity Selection -->
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-shopping-cart me-2"></i>Quantity</label>
                            <div class="quantity-control d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-outline-secondary" id="decrease-quantity">-</button>
                                <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="100">
                                <button type="button" class="btn btn-outline-secondary" id="increase-quantity">+</button>
                            </div>
                        </div>

                        <!-- Price Display -->
                        <div class="text-center">
                            <h4 class="card-text product-price" id="total-price">
                            ৳{{
                                    $variants->isNotEmpty() && $variants->first()->productVariant
                                        ? $variants->first()->productVariant->price
                                        : ($product->price ?? '0.00')
                                }}
                            </h4>
                            <small class="text-muted">Price updates dynamically</small>
                        </div>


                        <!-- Action Buttons -->
                        <div class="card-actions mt-3">
                            <a href="#" class="wishlist-icon" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                            <a href="#" class="cart-icon" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Form -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h4 class="card-title mb-0 text-white">Shipping Information</h4>
                    </div>
                    <div class="card-body">
                        <form id="order-form" action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label"><i class="fas fa-user me-2"></i>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label"><i class="fas fa-phone me-2"></i>Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10,15}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postcode" class="form-label"><i class="fas fa-map-pin me-2"></i>Postcode</label>
                                    <input type="text" class="form-control" id="zip" name="zip" pattern="[0-9]{4,6}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="address" class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Address</label>

                            <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="submit-btn" class="btn btn-primary btn-lg glow-btn">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection




@push('scripts')

<script>
    $(document).ready(function () {
        // Initialize Toastr options
        toastr.options = {
            closeButton: false,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000
        };

        // Price Calculation
        const basePrice = @json(
            $variants->isNotEmpty() && $variants->first()->productVariant
                ? $variants->first()->productVariant->price
                : ($product->price ?? 0)
        );

        function updatePrice() {
            const quantity = parseInt($('#quantity').val()) || 1;
            const total = (basePrice * quantity).toFixed(2);
            $('#total-price').text(`৳${total}`);
        }


        // Quantity Controls
        $('#increase-quantity').click(function () {
            let qty = parseInt($('#quantity').val()) || 1;
            if (qty < 100) {
                $('#quantity').val(qty + 1);
                updatePrice();
            }
        });

        $('#decrease-quantity').click(function () {
            let qty = parseInt($('#quantity').val()) || 1;
            if (qty > 1) {
                $('#quantity').val(qty - 1);
                updatePrice();
            }
        });

        $('#quantity').on('input change', function () {
            let qty = parseInt($(this).val()) || 1;
            if (qty < 1) qty = 1;
            if (qty > 100) qty = 100;
            $(this).val(qty);
            updatePrice();
        });

        // Color and Size Selection
        $('.color-swatch').click(function () {
            $('.color-swatch').removeClass('active');
            $(this).addClass('active');
        });

        // Color Visible
        $('.color-swatch').each(function () {
            const color = $(this).data('color');
            $(this).css('background-color', color);
        });

        $('.variant-btn').click(function () {
            $('.variant-btn').removeClass('active');
            $(this).addClass('active');
        });

        // Clear validation feedback
        $('input, textarea').on('input', function () {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').text('');
        });

        // Form Submission with AJAX
       $('#order-form').on('submit', function (e) {
        e.preventDefault();
        let isValid = true;
        const $form = $(this);
        const $submitBtn = $('#submit-btn');
        $submitBtn.prop('disabled', false);

        // Validate inputs...
        const fields = [
            { id: 'name', message: 'Name is required' },
            { id: 'email', message: 'Valid email is required', pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/ },
            { id: 'phone', message: 'Valid phone number (10-15 digits) is required', pattern: /^[0-9]{10,15}$/ },
            { id: 'zip', message: 'Valid postcode (4-6 digits) is required', pattern: /^[0-9]{4,6}$/ },
            { id: 'address', message: 'Address is required' }
        ];

        fields.forEach(field => {
            const $input = $(`#${field.id}`);
            const value = $input.val().trim();
            if (!value) {
                $input.addClass('is-invalid').next('.invalid-feedback').text(field.message);
                isValid = false;
            } else if (field.pattern && !field.pattern.test(value)) {
                $input.addClass('is-invalid').next('.invalid-feedback').text(field.message);
                isValid = false;
            }
        });

        if (!isValid) {
            toastr.error('Please fix the errors in the form.');
            $submitBtn.prop('disabled', false);
            return;
        }

        // Build form data manually
        const postData = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            zip: $('#zip').val(), // fix here
            address: $('#address').val(),
            quantity: $('#quantity').val(),
            price: (basePrice * $('#quantity').val()).toFixed(2), // fix here
            product_id: '{{ $product->id }}',
            product_variant_id: '{{ $variants->first()->productVariant->id ?? null }}'
        };


        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: postData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                toastr.success('Order placed successfully!');
                $form[0].reset();
                $('.color-swatch').removeClass('active').first().addClass('active');
                $('.variant-btn').removeClass('active').first().addClass('active');
                $('#quantity').val(1);
                updatePrice();
            },
            error: function (xhr) {
                 console.log(xhr);
                toastr.error('An error occurred. Please try again.');
            },
            complete: function () {
                $submitBtn.prop('disabled', false);
            }
        });
    });


        // Wishlist and Cart Icon Actions
        $('.wishlist-icon').click(function (e) {
            e.preventDefault();
            toastr.success('Added to Wishlist!');
        });

        $('.cart-icon').click(function (e) {
            e.preventDefault();
            toastr.success('Added to Cart!');
        });
    });
</script>
@endpush
