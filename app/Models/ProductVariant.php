<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributes(){
        return $this->hasMany(VariantAttribute::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
