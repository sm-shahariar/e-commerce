@extends('layouts.apps')

@section('content')
<!-- Creating the cart page with a clean, modern design -->
<section id="cart" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-dark animate__animated animate__fadeIn">Your Cart</h2>
        
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
                    <!-- Sample Cart Item -->
                    <tr class="cart-item" data-row-id="cart_item_1">
                        <td class="py-4">
                            <div class="d-flex align-items-center">
                                <img src="build/images/mens_product1.jpg" class="rounded shadow-sm me-3" alt="Men's Classic Shirt" style="width: 80px; height: 80px; object-fit: cover;">
                                <span class="fw-bold">Men's Classic Shirt</span>
                            </div>
                        </td>
                        <td class="py-4 align-middle price">$49.99</td>
                        <td class="py-4 align-middle">
                            <div class="quantity-control d-flex align-items-center">
                                <button class="btn btn-outline-primary btn-sm decrease-quantity">-</button>
                                <input type="number" class="form-control quantity mx-2" value="1" min="1" style="width: 60px; text-align: center;">
                                <button class="btn btn-outline-primary btn-sm increase-quantity">+</button>
                            </div>
                        </td>
                        <td class="py-4 align-middle subtotal">$49.99</td>
                        <td class="py-4 align-middle">
                            <button class="btn btn-danger btn-sm remove-item">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Sample Cart Item -->
                    <tr class="cart-item" data-row-id="cart_item_2">
                        <td class="py-4">
                            <div class="d-flex align-items-center">
                                <img src="build/images/womens_product1.jpg" class="rounded shadow-sm me-3" alt="Women's Summer Dress" style="width: 80px; height: 80px; object-fit: cover;">
                                <span class="fw-bold">Women's Summer Dress</span>
                            </div>
                        </td>
                        <td class="py-4 align-middle price">$69.99</td>
                        <td class="py-4 align-middle">
                            <div class="quantity-control d-flex align-items-center">
                                <button class="btn btn-outline-primary btn-sm decrease-quantity">-</button>
                                <input type="number" class="form-control quantity mx-2" value="2" min="1" style="width: 60px; text-align: center;">
                                <button class="btn btn-outline-primary btn-sm increase-quantity">+</button>
                            </div>
                        </td>
                        <td class="py-4 align-middle subtotal">$139.98</td>
                        <td class="py-4 align-middle">
                            <button class="btn btn-danger btn-sm remove-item">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Cart Cards for Mobile -->
        <div class="d-md-none mb-4">
            <!-- Sample Cart Item -->
            <div class="card mb-3 shadow-sm animate__animated animate__fadeIn animate__delay-1s cart-item" data-row-id="cart_item_1">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="build/images/mens_product1.jpg" class="rounded shadow-sm me-3" alt="Men's Classic Shirt" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <h6 class="mb-1 fw-bold">Men's Classic Shirt</h6>
                            <p class="mb-0 text-primary price">$49.99</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="quantity-control d-flex align-items-center">
                            <button class="btn btn-outline-primary btn-sm decrease-quantity">-</button>
                            <input type="number" class="form-control quantity mx-2" value="1" min="1" style="width: 60px; text-align: center;">
                            <button class="btn btn-outline-primary btn-sm increase-quantity">+</button>
                        </div>
                        <p class="mb-0 text-dark fw-bold subtotal">$49.99</p>
                    </div>
                    <button class="btn btn-danger btn-sm mt-3 remove-item">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            </div>
            <!-- Sample Cart Item -->
            <div class="card mb-3 shadow-sm animate__animated animate__fadeIn animate__delay-1s cart-item" data-row-id="cart_item_2">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="build/images/womens_product1.jpg" class="rounded shadow-sm me-3" alt="Women's Summer Dress" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <h6 class="mb-1 fw-bold">Women's Summer Dress</h6>
                            <p class="mb-0 text-primary price">$69.99</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="quantity-control d-flex align-items-center">
                            <button class="btn btn-outline-primary btn-sm decrease-quantity">-</button>
                            <input type="number" class="form-control quantity mx-2" value="2" min="1" style="width: 60px; text-align: center;">
                            <button class="btn btn-outline-primary btn-sm increase-quantity">+</button>
                        </div>
                        <p class="mb-0 text-dark fw-bold subtotal">$139.98</p>
                    </div>
                    <button class="btn btn-danger btn-sm mt-3 remove-item">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            </div>
        </div>

        <!-- Cart Summary and Order Button -->
        <div class="card shadow-lg p-4 mb-4 animate__animated animate__fadeIn animate__delay-2s">
            <h4 class="text-dark mb-3">Cart Summary</h4>
            <div class="d-flex justify-content-between mb-3">
                <span class="fw-bold">Total</span>
                <span class="fw-bold text-primary" id="cart-total">$189.97</span>
            </div>
            <div class="text-end">
                <a href="#" class="btn btn-primary btn-lg glow-btn">Order Now</a>
            </div>
        </div>
    </div>
</section>

@push('scripts')

<script>
    $(document).ready(function () {
        // Update subtotal and total
        function updateCart() {
            let total = 0;
            $('.cart-item').each(function () {
                const $row = $(this);
                const price = parseFloat($row.find('.price').text().replace('$', ''));
                const quantity = parseInt($row.find('.quantity').val());
                const subtotal = price * quantity;
                $row.find('.subtotal').text('$' + subtotal.toFixed(2));
                total += subtotal;
            });
            $('#cart-total').text('$' + total.toFixed(2));
        }

        // Increase quantity
        $(document).on('click', '.increase-quantity', function () {
            const $input = $(this).closest('.quantity-control').find('.quantity');
            const newQty = parseInt($input.val()) + 1;
            $input.val(newQty);
            updateCart();
        });

        // Decrease quantity
        $(document).on('click', '.decrease-quantity', function () {
            const $input = $(this).closest('.quantity-control').find('.quantity');
            const currentQty = parseInt($input.val());
            if (currentQty > 1) {
                $input.val(currentQty - 1);
                updateCart();
            }
        });

        // Manual quantity input
        $(document).on('change', '.quantity', function () {
            if (parseInt($(this).val()) < 1 || isNaN(parseInt($(this).val()))) {
                $(this).val(1);
            }
            updateCart();
        });

        // Remove item
        $(document).on('click', '.remove-item', function () {
            $(this).closest('.cart-item').remove();
            updateCart();
        });

        // Initial cart update
        updateCart();
    });
</script>
@endpush
@endsection