@extends('layouts.apps')

@section('content')
<!-- Creating the cart page with a clean, modern design -->
<section id="cart" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-dark animate__animated animate__fadeIn">Your Cart</h2>

        @if (session('success'))
            <div class="alert alert-success animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger animate__animated animate__fadeIn">
                {{ session('error') }}
            </div>
        @endif

        @if ($carts->isEmpty())
            <div class="alert alert-info text-center">
                Your cart is empty. <a href="{{ url('home') }}">Shop now!</a>
            </div>
        @else
            <!-- Cart Table for Desktop -->
            <div class="table-responsive d-none d-md-block mb-4 animate__animated animate__fadeIn animate__delay-1s">
                <table class="table table-hover bg-white rounded shadow-lg">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col" class="py-3">Product</th>
                            <th scope="col" class="py-3">Price</th>
                            <th scope="col" class="py-3">Quantity</th>
                            <th scope="col" class="py-3">Subtotal</th>
                            <th scope="col" class="py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr class="cart-item" data-cart-id="{{ $cart->id ?? $cart->product_id }}">
                                <td class="py-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($cart->product->image ?? 'build/images/default_product.jpg') }}" class="rounded shadow-sm me-3" alt="{{ $cart->product->name }}" style="width: 80px; height: 80px; object-fit: cover;">
                                        <span class="fw-bold">{{ $cart->product->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 align-middle price">৳ {{ number_format($cart->product->price, 2) }}</td>
                                <td class="py-4 align-middle">
                                    <form action="{{ route('cart.update', $cart->id ?? $cart->product_id) }}" method="POST" class="quantity-form">
                                        @csrf
                                        @method('PATCH')
                                        <div class="quantity-control d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-primary btn-sm decrease-quantity">-</button>
                                            <input type="number" name="quantity" class="form-control quantity mx-2" value="{{ $cart->quantity }}" min="1" style="width: 60px; text-align: center;">
                                            <button type="button" class="btn btn-outline-primary btn-sm increase-quantity">+</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="py-4 align-middle subtotal">৳ {{ number_format($cart->product->price * $cart->quantity, 2) }}</td>
                                <td class="py-4 align-middle">
                                    <div class="d-flex align-items-center">
                                        <!-- Delete Button -->
                                        <form action="{{ route('cart.destroy', $cart->id ?? $cart->product_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm remove-item me-2">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        <!-- Order Now Button for Individual Item -->
                                        <a href="{{ route('product.order', $cart->product_id) }}" class="btn btn-primary btn-xs">Order Now</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Cart Cards for Mobile -->
            <div class="d-md-none mb-4">
                @foreach ($carts as $cart)
                    <div class="card mb-3 shadow-sm animate__animated animate__fadeIn animate__delay-1s cart-item" data-cart-id="{{ $cart->id ?? $cart->product_id }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset($cart->product->image ?? 'build/images/default_product.jpg') }}" class="rounded shadow-sm me-3" alt="{{ $cart->product->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $cart->product->name }}</h6>
                                    <p class="mb-0 text-primary price">৳ {{ number_format($cart->product->price, 2) }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <form action="{{ route('cart.update', $cart->id ?? $cart->product_id) }}" method="POST" class="quantity-form">
                                    @csrf
                                    @method('PATCH')
                                    <div class="quantity-control d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-primary btn-sm decrease-quantity">-</button>
                                        <input type="number" name="quantity" class="form-control quantity mx-2" value="{{ $cart->quantity }}" min="1" style="width: 60px; text-align: center;">
                                        <button type="button" class="btn btn-outline-primary btn-sm increase-quantity">+</button>
                                    </div>
                                </form>
                                <p class="mb-0 text-dark fw-bold subtotal">৳ {{ number_format($cart->product->price * $cart->quantity, 2) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- Delete Button -->
                                <form action="{{ route('cart.destroy', $cart->id ?? $cart->product_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm remove-item">
                                        <i class="fa fa-trash"></i> Remove
                                    </button>
                                </form>
                                <a href="{{ route('product.order', $cart->product_id) }}" class="btn btn-primary btn-xs">Order Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Cart Summary and Order Button -->
            <div class="card shadow-lg p-4 mb-4 animate__animated animate__fadeIn animate__delay-2s">
                <h4 class="text-dark mb-3">Cart Summary</h4>
                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold text-primary" id="cart-total">৳ {{ number_format($cartTotalCost, 2) }}</span>
                </div>
                <div class="text-end">
                    <form id="orderForm" action="#" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg glow-btn">Order All</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function () {
        toastr.options = {
            closeButton: false,
            progressBar: true,
            background: '#00ff7f',
            positionClass: 'toast-top-right',
            timeOut: 3000
        };

        // Handle quantity increase
        $('.increase-quantity').on('click', function () {
            const $input = $(this).closest('.quantity-control').find('.quantity');
            const newQty = parseInt($input.val()) + 1;
            $input.val(newQty).trigger('change');
        });

        // Handle quantity decrease
        $('.decrease-quantity').on('click', function () {
            const $input = $(this).closest('.quantity-control').find('.quantity');
            const currentQty = parseInt($input.val());
            if (currentQty > 1) {
                $input.val(currentQty - 1).trigger('change');
            }
        });

        // Handle manual quantity input
        $('.quantity').on('change', function () {
            const $input = $(this);
            const $form = $input.closest('.quantity-form');
            if (parseInt($input.val()) < 1 || isNaN(parseInt($input.val()))) {
                $input.val(1);
            }

            // Submit the form via AJAX to update quantity
            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        // Update subtotal and total
                        const $row = $input.closest('.cart-item');
                        const price = parseFloat($row.find('.price').text().replace('৳ ', '').replace(',', ''));
                        const quantity = parseInt($input.val());
                        const subtotal = price * quantity;
                        $row.find('.subtotal').text('৳ ' + subtotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                        $('#cart-total').text('৳ ' + response.cartTotalCost.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('Failed to update quantity.');
                    $input.val(1); // Reset on error
                }
            });
        });

        // Handle remove item
        $('.remove-item').on('click', function (e) {
            e.preventDefault();
            const $form = $(this).closest('form');
            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $form.closest('.cart-item').remove();
                        $('#cart-total').text('৳ ' + response.cartTotalCost.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                        if ($('.cart-item').length === 0) {
                            location.reload(); // Reload to show empty cart message
                        }
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('Failed to remove item.');
                }
            });
        });
    });
</script>
@endpush
@endsection