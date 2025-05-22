@extends('layouts.apps')
@section('content')

<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-4 g-3 mt-3">
    @if ($products->count() == 0)
        <p class="font-weight-bold bg-primary text-white rounded-pill p-2 text-center" style="margin-left: 38%; margin-top: 40px;">No Product Found</p>
    @else
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm small-card">
                    <div class="card-img-wrapper position-relative">
                        <img src="{{ $product->thumbnail }}" class="card-img-top" alt="{{ $product->name }}">
                        <a href="{{ url('product-details/' . $product->id) }}" class="details-icon">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $product->name }}</h6 neat
                        <p class="card-text">৳{{ $product->price }}</p>
                        <div class="d-flex justify-content-center gap-1">
                            <form action="{{ route('cart.store', $product->id) }}" method="POST" class="cart-form" data-product-id="{{ $product->id }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-xs" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </form>
                            <a href="{{ route('product.order', $product->id) }}" class="btn btn-primary btn-xs">Order Now</a>
                            <form action="{{ route('wishlist.store', $product->id) }}" method="POST" class="wishlist-form" data-product-id="{{ $product->id }}" style="display:inline;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-secondary btn-xs" title="Add to Wishlist">
                                    <i class="fa fa-heart"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection