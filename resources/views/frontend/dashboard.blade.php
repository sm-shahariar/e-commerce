@extends('layouts.apps')
@section('content')
    <!-- Creating the user dashboard with a sidebar and main content -->
    <div class="container-fluid bg-offwhite min-vh-100">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <img src="{{ $user->image }}" class="rounded-circle" width="80" height="80" alt="User Avatar">
                        <h5 class="text-white mt-2">{{ $user->name }}</h5>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white glow-text" href="{{ route('home') }}">
                                <i class="fa fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('profile') }}">
                                <i class="fa fa-user me-2"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('order.index') }}">
                                <i class="fa fa-shopping-bag me-2"></i> Order List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('wishlist.index') }}">
                                <i class="fa fa-heart me-2"></i> Wishlist
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('cart.index') }}">
                                <i class="fa fa-shopping-cart me-2"></i> Cart List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
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
                                <p class="card-text">Track your recent orders (
                                    {{ $orderCount }}).</p>
                                <a href="{{ url('orders') }}" class="btn btn-primary glow-btn">View Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <i class="fa fa-heart fa-2x text-primary mb-2"></i>
                                <h5 class="card-title">Wishlist</h5>
                                <p class="card-text">Check your favorite items ({{ $wishlistCount }} items).</p>
                                <a href="{{ url('wishlist') }}" class="btn btn-primary glow-btn">View Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <i class="fa fa-shopping-cart fa-2x text-primary mb-2"></i>
                                <h5 class="card-title">Cart</h5>
                                <p class="card-text">Review items in your cart ({{ $cartCount }} items).</p>
                                <a href="{{ url('cart') }}" class="btn btn-primary glow-btn">View Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders Section -->
                <div class="mb-5">
                    <h2 class="mb-4">Recent Orders</h2>
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Order No</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Attributes</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            @php
                                                $orderLoop = $loop;
                                                $orderItemsCount = count($order->orderItems);
                                            @endphp
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    @if ($loop->first)
                                                        <td rowspan="{{ $orderItemsCount }}">{{ $orderLoop->iteration }}
                                                        </td>
                                                        <td rowspan="{{ $orderItemsCount }}">{{ $order->order_number }}
                                                        </td>
                                                        <td rowspan="{{ $orderItemsCount }}">
                                                            {{ $order->user->name ?? 'N/A' }}</td>
                                                    @endif

                                                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ number_format($item->price, 2) }}</td>
                                                    <td>
                                                        @if ($item->variant && $item->variant->attributes->count())
                                                            @foreach ($item->variant->attributes as $attribute)
                                                                <span class="badge bg-primary mb-1">
                                                                    {{ $attribute->attribute->name ?? '' }}:
                                                                    {{ $attribute->values->pluck('value.name')->implode(', ') }}
                                                                </span><br>
                                                            @endforeach
                                                        @else
                                                            <span class="text-muted">N/A</span>
                                                        @endif
                                                    </td>

                                                    @if ($loop->first)
                                                        <td rowspan="{{ $orderItemsCount }}">
                                                            @if ($order->status == 1)
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif ($order->status == 2)
                                                                <span class="badge bg-info">Processing</span>
                                                            @elseif ($order->status == 3)
                                                                <span class="badge bg-danger">Cancelled</span>
                                                            @elseif($order->status == 4)
                                                                <span class="badge bg-success">Delivered</span>
                                                            @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center text-muted">No Order Found</td>
                                                </tr>
                                            @endforelse
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
                            @foreach ($wishlists as $wishlist)
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ $wishlist->product->thumbnail }}" class="card-img-top"
                                            alt="Wishlist Item 1">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Wishlist Item {{ $loop->iteration }}</h5>
                                            <p class="card-text">{{ $wishlist->product->name }}</p>
                                            <a href="{{ route('cart.store', $wishlist->product->id) }}"
                                                class="btn btn-primary btn-sm glow-btn cart-icon">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                                <th>Cart Id</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $cart->product->name }}</td>
                                                    <td>{{ $cart->product->price }}</td>
                                                    <td><a href="{{ route('cart.destroy', $cart->id) }}"
                                                            class="btn btn-danger btn-sm remove-cart"
                                                            data-id="1">Remove</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
            $(document).ready(function() {
                // Initialize Toastr options
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                    timeOut: 3000
                };

                // Remove from Cart
                $('.remove-cart').on('click', function(e) {
                    e.preventDefault();
                    const cartId = $(this).data('id');
                    $.ajax({
                        url: '',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            cart_id: cartId
                        },
                        success: function(response) {
                            toastr.success('Item removed from cart!');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function() {
                            toastr.error('Failed to remove item from cart.');
                        }
                    });
                });

                // Add to Cart from Wishlist
                $('.cart-icon').on('click', function(e) {
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
                        success: function(response) {
                            toastr.success('Item added to cart!');
                        },
                        error: function() {
                            toastr.error('Failed to add item to cart.');
                        }
                    });
                });
            });
        </script>
    @endpush
