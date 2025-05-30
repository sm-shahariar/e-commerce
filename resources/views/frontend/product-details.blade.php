@extends('layouts.apps')

@section('content')
    <div class="container mb-5">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Product Gallery Column -->
            <div class="col-lg-6">
                <div class="product-gallery mb-4">
                    <img src="{{ $product->thumbnail }}" class="img-fluid rounded main-image" alt="Premium Denim Jacket"
                        id="mainProductImage" width="450" height="300">
                </div>
                <div class="thumbnails d-flex flex-wrap gap-2">
                    @if ($product->images && count($product->images) > 0)
                        @foreach ($product->images as $image)
                        <img src="{{ $image->url }}" class="img-thumbnail thumbnail active" width="80" alt="Front view">
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Product Info Column -->
            <div class="col-lg-6">
                <h1 class="mb-2">{{ $product->name }}</h1>
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-success">In Stock: <span class="ms-2" id="productStock">{{ $product->stock }}</span></span>
                </div>

                <div class="price mb-3">
                    <span class="ms-2" id="productPrice">৳ {{ $product->price }}</span>
                </div>

                @foreach ($attributes as $attributeName => $valuesGroup)
                    @php
                        $index = $loop->index;
                    @endphp
                    <div class="mb-4">
                        <h5 class="mb-3">{{ $attributeName }}</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($valuesGroup->flatten() as $value)
                                @if ($attributeName == 'Color')
                                    <div class="color-option attribute-value"
                                        style="background-color: {{ $value->value->name }}"
                                        data-color="{{ $value->value->name }}" data-index="{{ $index }}"
                                        data-value-id="{{ $value->id }}"
                                        data-attribute-id="{{ $value->variant_attribute_id }}"
                                        title="{{ $value->value->name }}"></div>
                                @else
                                    <div class="size-option attribute-value p-2 border rounded"
                                        data-index="{{ $index }}" data-value-id="{{ $value->id }}"
                                        data-attribute-id="{{ $value->variant_attribute_id }}">{{ $value->value->name }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- Quantity and Add to Cart -->
                <div class="d-flex align-items-center mb-4">
                    <div class="input-group me-3" style="width: 140px;">
                        <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                        <input type="text" class="form-control text-center quantity-input" value="1">
                        <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                    </div>
                    <form action="{{ route('cart.store', $product->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_variant_id" id="productVariantId">
                        <button type="submit" id="addToCartBtn" class="btn btn-primary btn-lg flex-grow-1 add-to-cart-btn">
                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                        </button>
                    </form>
                </div>

                <form id="wishlist-form" action="{{ route('wishlist.store', $product->id) }}" method="POST"
                    class="wishlist-form" style="display:inline;">
                    @csrf
                    <input type="hidden" name="product_variant_id"
                        value="{{ $product->variants->first()->id }}">
                </form>

                <!-- Wishlist and Share -->
                <div class="d-flex gap-3">
                    <button class="btn btn-outline-secondary wishlist-btn" form="wishlist-form">
                        <i class="far fa-heart me-2"></i> Add to Wishlist
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-share-alt me-2"></i> Share
                    </button>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs mb-4" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab">Description</button>
                    </li>
                </ul>

                <div class="tab-content" id="productTabsContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- You May Also Like -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Complete Your Look</h3>
                <div class="row" id="relatedProducts">
                    <!-- Related products will be loaded via AJAX -->
                    <div class="col-12 text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize toastr
            toastr.options = {
                "closeButton": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "3000"
            };

            // Product variants data (should be passed from controller)
            const variants = @json($variants);


            console.log(variants);

            // Selected values storage


            // Thumbnail image click handler
            $('.thumbnail').click(function() {
                $('.thumbnail').removeClass('active');
                $(this).addClass('active');
                $('#mainProductImage').attr('src', $(this).data('fullsize'));
            });

            let selectedValues = {};

            // Color selection
            $('.attribute-value').click(function() {
                //.attribute-value siblings of this element
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                selectedValues[$(this).data('index')] = {
                    'attribute_id': $(this).data('attribute-id'),
                    'attribute_value_id': $(this).data('value-id')
                };

                const productVariationId = findVariationId(variants, Object.values(selectedValues));

                if (productVariationId) {
                    const price = getPrice(productVariationId);
                    $('#productPrice').html('৳ ' + price);
                    const stock = getStock(productVariationId);
                    $('#productStock').html(stock);

                    $('#productVariantId').val(productVariationId);
                    $('#addToCartBtn').prop('disabled', false);
                } else {
                    $('#productVariantId').val('');
                    $('#addToCartBtn').prop('disabled', true);

                    toastr.error('Selected combination is not available. choose another combination.');
                }
            });

            function findVariationId(variants, selectedAttributes) {
                // Create a map to group variants by product_variation_id
                const variantMap = new Map();

                // Group all variant entries by their product_variation_id
                for (const variant of variants) {
                    if (!variantMap.has(variant.product_variation_id)) {
                        variantMap.set(variant.product_variation_id, []);
                    }
                    variantMap.get(variant.product_variation_id).push(variant);
                }

                // Check each product variation to see if it matches all selected attributes
                for (const [variationId, variantEntries] of variantMap.entries()) {
                    let allAttributesMatch = true;

                    for (const selectedAttr of selectedAttributes) {
                        // Find if this variant has an entry for the selected attribute
                        const variantAttrEntry = variantEntries.find(
                            entry => entry.attribute === selectedAttr.attribute_id
                        );

                        // Check if the selected value is in the variant's values
                        if (!variantAttrEntry ||
                            !variantAttrEntry.values.includes(selectedAttr.attribute_value_id)) {
                            allAttributesMatch = false;
                            break;
                        }
                    }

                    if (allAttributesMatch) {
                        return variationId;
                    }
                }

                return null; // No matching variation found
            }

            function getPrice(variationId) {
                const product = @json($product);
                const variant = product.variants.find(variant => variant.id === variationId);
                return variant.price;
            }

            function getStock(variationId) {
                const product = @json($product);
                const variant = product.variants.find(variant => variant.id === variationId);
                return variant.qty;
            }

            // Update stock information
            function updateStockInfo(stock) {
                const stockBadge = $('.badge.bg-success');
                if (stock > 0) {
                    stockBadge.text(`In Stock: ${stock}`);
                    stockBadge.removeClass('bg-danger').addClass('bg-success');
                    $('.add-to-cart-btn').prop('disabled', false);
                } else {
                    stockBadge.text('Out of Stock');
                    stockBadge.removeClass('bg-success').addClass('bg-danger');
                    $('.add-to-cart-btn').prop('disabled', true);
                }
            }

            // Update price display
            function updatePrice(price) {
                $('.price span').text(`৳ ${price}`);
            }

            // Quantity adjustment
            $('.minus-btn').click(function() {
                var $input = $(this).siblings('.quantity-input');
                var value = parseInt($input.val());
                if (value > 1) {
                    $input.val(value - 1);
                }
            });

            $('.plus-btn').click(function() {
                var $input = $(this).siblings('.quantity-input');
                var value = parseInt($input.val());
                $input.val(value + 1);
            });

            // Add to cart with AJAX
            $(document).on('submit', 'form[action="{{ route('cart.store', $product->id) }}"]', function(e) {

                e.preventDefault();

                const variantId = $('#productVariantId').val();
                const quantity = $('.quantity-input').val();

                // Check if any attribute options are available
                const hasAttributes = $('.color-option, .size-option').length > 0;

                if (hasAttributes && !variantId) {
                    // Highlight the unselected options
                    if (!selectedValues['Color'] && $('.color-option').length) {
                        toastr.error('Please select a color');
                        $('.color-option').first().focus();
                        return;
                    }
                    if (!selectedValues['Size'] && $('.size-option').length) {
                        toastr.error('Please select a size');
                        $('.size-option').first().focus();
                        return;
                    }
                    return;
                }

                // If no attributes exist (simple product), we can proceed without variantId
                if (!hasAttributes) {
                    // For simple products without variants
                    $('#productVariantId').val('{{ $product->default_variant_id }}');
                }

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_variant_id: variantId || '{{ $product->default_variant_id }}',
                        quantity: quantity
                    },
                    beforeSend: function() {
                        $('.add-to-cart-btn').prop('disabled', true).html(
                            '<i class="fas fa-spinner fa-spin"></i> Adding...');
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            // Update cart count in navbar
                            $('.cart-count').text(response.cart_count);
                        } else {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON?.message ||
                            'An error occurred while adding to cart.');
                    },
                    complete: function() {
                        $('.add-to-cart-btn').prop('disabled', false).html(
                            '<i class="fas fa-shopping-cart me-2"></i> Add to Cart');
                    }
                });
            });

            // Initial load
            // loadRelatedProducts();
        });
    </script>
@endpush
