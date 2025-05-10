@extends('layouts.apps')
@section('content')
<!-- Creating the user dashboard with a sidebar and main content -->
<div class="container-fluid bg-offwhite min-vh-100">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky pt-3">
                <div class="text-center mb-4">
                    <img src="{{ asset('build/images/user-avatar.png') }}" class="rounded-circle" width="80" height="80" alt="User Avatar">
                    <h5 class="text-white mt-2">John Doe</h5>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-white glow-text" href="{{ url('dashboard') }}">
                            <i class="fa fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('profile') }}">
                            <i class="fa fa-user me-2"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('orders') }}">
                            <i class="fa fa-shopping-bag me-2"></i> Order List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('wishlist') }}">
                            <i class="fa fa-heart me-2"></i> Wishlist
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('cart') }}">
                            <i class="fa fa-shopping-cart me-2"></i> Cart List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-5">
            <!-- Sidebar Toggle Button for Mobile -->
            <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
                <i class="fa fa-bars"></i> Menu
            </button>

            <!-- Dashboard Header -->
            <h1 class="h2 mb-4">User Dashboard</h1>

            <!-- Overview Cards -->
            <div class="row mb-5">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fa fa-user fa-2x text-primary mb-2"></i>
                            <h5 class="card-title">Profile</h5>
                            <p class="card-text">View and update your personal information.</p>
                            <a href="{{ url('profile') }}" class="btn btn-primary glow-btn">Go to Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fa fa-shopping-bag fa-2x text-primary mb-2"></i>
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text">Track your recent orders (3 pending).</p>
                            <a href="{{ url('orders') }}" class="btn btn-primary glow-btn">View Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fa fa-heart fa-2x text-primary mb-2"></i>
                            <h5 class="card-title">Wishlist</h5>
                            <p class="card-text">Check your favorite items (5 items).</p>
                            <a href="{{ url('wishlist') }}" class="btn btn-primary glow-btn">View Wishlist</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fa fa-shopping-cart fa-2x text-primary mb-2"></i>
                            <h5 class="card-title">Cart</h5>
                            <p class="card-text">Review items in your cart (2 items).</p>
                            <a href="{{ url('cart') }}" class="btn btn-primary glow-btn">View Cart</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Section -->
            <div class="mb-5">
                <h2 class="mb-4">Recent Orders</h2>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1001</td>
                                        <td>2025-05-01</td>
                                        <td>$99.99</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td><a href="" class="btn btn-primary btn-sm glow-btn">Details</a></td>
                                    </tr>
                                    <tr>
                                        <td>#1002</td>
                                        <td>2025-04-28</td>
                                        <td>$149.99</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td><a href="" class="btn btn-primary btn-sm glow-btn">Details</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wishlist Preview -->
            <div class="mb-5">
                <h2 class="mb-4">Wishlist Preview</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('build/images/product1.jpg') }}" class="card-img-top" alt="Wishlist Item 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">Wishlist Item 1</h5>
                                <p class="card-text">$49.99</p>
                                <a href="" class="btn btn-primary btn-sm glow-btn cart-icon">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('build/images/product2.jpg') }}" class="card-img-top" alt="Wishlist Item 2">
                            <div class="card-body text-center">
                                <h5 class="card-title">Wishlist Item 2</h5>
                                <p class="card-text">$59.99</p>
                                <a href="" class="btn btn-primary btn-sm glow-btn cart-icon">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Preview -->
            <div class="mb-5">
                <h2 class="mb-4">Cart Preview</h2>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cart Item 1</td>
                                        <td>$29.99</td>
                                        <td>2</td>
                                        <td>$59.98</td>
                                        <td><a href="#" class="btn btn-danger btn-sm remove-cart" data-id="1">Remove</a></td>
                                    </tr>
                                    <tr>
                                        <td>Cart Item 2</td>
                                        <td>$49.99</td>
                                        <td>1</td>
                                        <td>$49.99</td>
                                        <td><a href="#" class="btn btn-danger btn-sm remove-cart" data-id="2">Remove</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end">
                            <a href="{{ url('cart') }}" class="btn btn-primary glow-btn">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection



@push('scripts')
<script>
    $(document).ready(function () {
        // Initialize Toastr options
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000
        };

        // Remove from Cart
        $('.remove-cart').on('click', function (e) {
            e.preventDefault();
            const cartId = $(this).data('id');
            $.ajax({
                url: '',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_id: cartId
                },
                success: function (response) {
                    toastr.success('Item removed from cart!');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                },
                error: function () {
                    toastr.error('Failed to remove item from cart.');
                }
            });
        });

        // Add to Cart from Wishlist
        $('.cart-icon').on('click', function (e) {
            e.preventDefault();
            const productId = $(this).data('id') || $(this).attr('href').split('/').pop();
            $.ajax({
                url: '',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: 1
                },
                success: function (response) {
                    toastr.success('Item added to cart!');
                },
                error: function () {
                    toastr.error('Failed to add item to cart.');
                }
            });
        });
    });
</script>
@endpush