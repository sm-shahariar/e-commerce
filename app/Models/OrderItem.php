<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variantAttributeValues()
    {
        return $this->belongsToMany(VariantAttributeValue::class);
    }

    public function variants()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }


}
