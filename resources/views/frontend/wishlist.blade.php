@extends('layouts.apps')
@section('content')
<!-- Wishlist page to view and manage wishlisted products -->
<section id="wishlist-section" class="py-5 position-relative overflow-hidden">
    <div class="container">
        <!-- Radial Gradient Overlay -->
        <div class="profile-bg-overlay"></div>

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4 animate__animated animate__fadeIn">
            <ol class="breadcrumb bg-transparent p-0 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h2 class="product-title text-center mb-5 animate__animated animate__fadeIn">Your Wishlist</h2>

        <div class="row justify-content-center animate__animated animate__fadeInUp">
            <!-- Wishlist Items -->
            <div class="col-lg-10">
                
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h4 class="card-title">Your Wishlist is Empty</h4>
                        <p class="product-details text-muted">
                            Start adding products to your wishlist to keep track of your favorite items!
                        </p>
                        <a href="{{ url('home') }}" class="btn btn-primary glow-btn btn-lg">
                            Shop Now
                        </a>
                    </div>
                </div>
            
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($wishlists as $wishlist)
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-img-wrapper">
                                    <img src="{{ $wishlist->product->thumbnail }}" alt="" class="card-img-top">
                                    <a href="{{ route('product.details', $wishlist->product->id) }}" class="details-icon">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text product-price">৳ {{ $wishlist->product->price }}</p>
                                    <div class="card-actions">
                                        <a href="{{ route('wishlist.destroy', $wishlist->product->id) }}" class="wishlist-icon remove-from-wishlist" data-id="" title="Remove from Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="#" class="cart-icon add-to-cart" data-id="" title="Add to Cart">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <form action="{{ route('wishlist.store', $wishlist->product->id) }}" method="POST" class="order-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-primary glow-btn btn-sm w-100">Order Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Clear Wishlist Button -->
                <div class="text-center mt-5">
                    <form action="{{ route('wishlist.destroy') }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg clear-wishlist">Clear Wishlist</button>
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

        // Remove from Wishlist
        $('.remove-from-wishlist').on('click', function (e) {
            e.preventDefault();
            const productId = $(this).data('id');
            $.ajax({
                url: '/wishlist/' + productId,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function (response) {
                    toastr.success('Item removed from wishlist!');
                    // Reload the wishlist section by making an AJAX request
                    reloadWishlist();
                },
                error: function () {
                    toastr.error('Failed to remove item from wishlist.');
                }
            });
        });

        // Add to Cart
        $('.add-to-cart').on('click', function (e) {
            e.preventDefault();
            const productId = $(this).data('id');
            $.ajax({
                url: '/cart',
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

        // Clear Wishlist Button Click
        $('.clear-wishlist').on('click', function (e) {
            e.preventDefault();

            $.ajax({
                url: '/wishlists',
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    toastr.success('All wishlist items removed!');
                    // Reload the wishlist section by making an AJAX request
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                },
                error: function (xhr) {
                    toastr.error('Failed to clear wishlist.');
                    console.error(xhr.responseText);
                }
            });
        });

        
    });

</script>
@endpush
