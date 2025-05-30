@extends('layouts.apps')
@section('content')
    <!-- Cart Section -->
    <section class="py-5">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-1"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('products') }}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Your Cart</li>
                </ol>
            </nav>

            <h2 class="section-title">Your Shopping Cart</h2>

            <div class="row">
                <div class="col-lg-8">
                    @if (count($carts) > 0)
                        <div class="card mb-4 border-0">
                            <div class="card-body p-0">
                                @foreach ($carts as $cart)
                                    <!-- Cart Item -->
                                    <div class="cart-item" data-item-id="{{ $cart->id }}">
                                        <div class="row">
                                            <div class="col-md-2 mb-3 mb-md-0">
                                                <div class="position-relative">
                                                    <img src="{{ $cart->product->thumbnail }}"
                                                        class="cart-item-img img-fluid" alt="{{ $cart->product->name }}">
                                                    @if ($cart->product->discount > 0)
                                                        <div class="discount-badge">-{{ $cart->product->discount }}%</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="product-title">{{ $cart->product->name }}</h5>

                                                <div class="mb-3">
                                                    @foreach ($cart->productVariant->attributes as $attribute)
                                                        <div class="mb-2">
                                                            <div class="attribute-title">{{ $attribute->attribute->name }}
                                                            </div>
                                                            <div>
                                                                @foreach ($attribute->values as $value)
                                                                    <span
                                                                        class="attribute-badge">{{ $value->value->name }}</span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="d-flex align-items-center quantity-controls">
                                                    <button
                                                        class="btn btn-outline-secondary btn-sm quantity-btn minus px-3">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input class="form-control quantity-input mx-2"
                                                        value="{{ $cart->quantity }}" min="1">
                                                    <button class="btn btn-outline-secondary btn-sm quantity-btn plus px-3">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <div class="loading-spinner ms-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-md-center mt-3 mt-md-0">
                                                <p class="mb-1 text-muted small">Unit Price</p>
                                                <h5 class="current-price mb-1">
                                                    ৳{{ number_format($cart->productVariant->price, 2) }}</h5>
                                                @if ($cart->product->discount > 0)
                                                    <p class="original-price mb-0">
                                                        ৳{{ number_format($cart->productVariant->price * (1 + $cart->product->discount / 100), 2) }}
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="col-md-2 text-md-center mt-3 mt-md-0">
                                                <p class="mb-1 text-muted small">Total</p>
                                                <h5 class="item-total mb-2">
                                                    ৳{{ number_format($cart->productVariant->price * $cart->quantity, 2) }}
                                                </h5>
                                                <a href="" class="btn btn-link remove-item p-0">

                                                </a>
                                                <form action="{{ route('cart.delete', $cart->product->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-link clear-cart" type="submit">
                                                        <i class="fas fa-trash me-1"></i> Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-5">
                            <a href="{{ route('home') }}" class="back-to-shop">
                                <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link clear-cart" type="submit">
                                    <i class="fas fa-trash me-1"></i>Clear Cart
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="card border-0">
                            <div class="empty-cart">
                                <div class="empty-cart-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <h3 class="mb-3">Your Cart is Empty</h3>
                                <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet</p>
                                <a href="{{ url('products') }}" class="btn btn-primary">
                                    <i class="fas fa-store me-2"></i>Start Shopping
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card summary-card mb-4">
                        <div class="card-body">
                            <h5 class="summary-title mb-4">
                                <i class="fas fa-receipt me-2"></i>Order Summary
                            </h5>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal (<span class="total-items"></span> items)</span>
                                <span class="summary-value">৳<span class="subtotal"></span></span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-4">
                                <h5>Total</h5>
                                <h5 class="summary-value">৳<span class="total-price"></span></h5>
                            </div>
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address">Delivery Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address">Note</label>
                                    <input type="text" class="form-control" id="note" name="note">
                                </div>


                                <div class="form-group mb-3">
                                    <label for="payment_type">Payment Type</label>
                                    <select class="form-select" name="payment_type" id="payment_type" required>
                                        <option value="">Select Payment Type</option>
                                        <option value="cash_on_delivery">Cash on Delivery</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-checkout w-100 py-2 mb-3 text-white"
                                    id="checkout-btn">
                                    <i class="fas fa-lock me-2"></i>Complete Checkout
                                </button>
                            </form>



                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="card-body">
                            <h6 class="mb-3"><i class="fas fa-shield-alt me-2 text-success"></i> Secure Shopping
                                Guarantee
                            </h6>
                            <p class="small text-muted mb-0">Your information is protected by 256-bit SSL encryption. We
                                never store your credit card details.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {

        updateCartSummary();
        updateCartCount();

        
        // Color selection
        document.querySelectorAll('.color-option').forEach(color => {
            color.addEventListener('click', function() {
                const parent = this.closest('.cart-item');
                parent.querySelectorAll('.color-option').forEach(opt => opt.classList.remove(
                    'selected'));
                this.classList.add('selected');
                parent.querySelector('.selected-color').value = this.dataset.color;
                updateCartItem(parent);
            });
        });

        // Size selection
        document.querySelectorAll('.size-option').forEach(size => {
            size.addEventListener('click', function() {
                const parent = this.closest('.cart-item');
                parent.querySelectorAll('.size-option').forEach(opt => opt.classList.remove(
                    'selected'));
                this.classList.add('selected');
                parent.querySelector('.selected-size').value = this.dataset.size;
                updateCartItem(parent);
            });
        });

        // Quantity buttons functionality
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.quantity-input');
                let value = parseInt(input.value);

                if (this.classList.contains('minus') && value > 1) {
                    input.value = value - 1;
                } else if (this.classList.contains('plus')) {
                    input.value = value + 1;
                }

                updateCartItem(this.closest('.cart-item'));
            });
        });

        // Quantity input change
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                if (this.value < 1) this.value = 1;
                updateCartItem(this.closest('.cart-item'));
            });
        });


        // Remove item
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const item = this.closest('.cart-item');
                showLoading(item);

                // Simulate AJAX call to remove item
                setTimeout(() => {
                    item.remove();
                    updateCartSummary();
                    updateCartCount();
                    hideLoading(item);
                }, 800);
            });
        });

        // Clear cart
        document.getElementById('clear-cart').addEventListener('click', function() {
            if (confirm('Are you sure you want to clear your cart?')) {
                document.querySelectorAll('.cart-item').forEach(item => {
                    showLoading(item);
                });

                // Simulate AJAX call to clear cart
                setTimeout(() => {
                    document.querySelectorAll('.cart-item').forEach(item => item.remove());
                    updateCartSummary();
                    updateCartCount();
                }, 1000);
            }
        });

        // Apply promo code
        document.getElementById('apply-promo').addEventListener('click', function() {
            const promoCode = document.getElementById('promoCode').value;
            const promoFeedback = document.getElementById('promo-feedback');

            if (!promoCode) {
                document.getElementById('promoCode').classList.add('is-invalid');
                promoFeedback.textContent = 'Please enter a promo code';
                return;
            }

            // Simulate AJAX call to validate promo code
            showLoading(this);
            this.disabled = true;

            setTimeout(() => {
                hideLoading(this);
                this.disabled = false;


            }, 1000);
        });

        // Checkout button
        document.getElementById('checkout-btn').addEventListener('click', function() {
            // In a real app, this would redirect to checkout
            alert('Proceeding to checkout');
        });

        // Helper function to update cart item via AJAX
        function updateCartItem(item) {
            showLoading(item);

            // Simulate AJAX call to update cart
            setTimeout(() => {
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                const priceText = item.querySelector('.current-price') ?
                    item.querySelector('.current-price').textContent.replace('৳', '') :
                    item.querySelector('h5').textContent.replace('৳', '');
                const price = parseFloat(priceText);
                const total = (quantity * price).toFixed(2);

                item.querySelector('.item-total').textContent = '৳' + total;
                updateCartSummary();
                hideLoading(item);
            }, 800);
        }

        // Update cart summary
        function updateCartSummary() {
            let subtotal = 0;
            let itemCount = 0;

            document.querySelectorAll('.cart-item').forEach(item => {
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                const priceText = item.querySelector('.current-price') ?
                    item.querySelector('.current-price').textContent.replace('৳', '') :
                    item.querySelector('h5').textContent.replace('৳', '');
                const price = parseFloat(priceText);

                console.log(price, quantity);

                subtotal += quantity * price;
                itemCount += quantity;
            });


            const total = (parseFloat(subtotal));
            console.log(total);
            document.querySelector('.subtotal').textContent = subtotal.toFixed(2);
            document.querySelector('.total-price').textContent = total;
            document.querySelector('.total-items').textContent = itemCount;
        }

        // Update cart count in navbar
        function updateCartCount() {
            let itemCount = 0;
            document.querySelectorAll('.cart-item').forEach(item => {
                itemCount += parseInt(item.querySelector('.quantity-input').value);
            });

            document.querySelector('.badge').textContent = itemCount;
        }



        // Show loading spinner
        function showLoading(element) {
            const spinner = element.querySelector('.loading-spinner') || element;
            spinner.style.display = 'inline-block';
            if (element.tagName === 'BUTTON') {
                element.innerHTML = '';
                element.appendChild(spinner);
            }
        }

        // Hide loading spinner
        function hideLoading(element) {
            const spinner = element.querySelector('.loading-spinner') || element;
            spinner.style.display = 'none';
            if (element.tagName === 'BUTTON') {
                element.textContent = element === document.getElementById('apply-promo') ? 'Apply' :
                    'Proceed to Checkout';
            }
        }
    });
</script>
