<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantValue extends Model
{
    protected $guarded = [];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function productAttributeValue()
    {
        return $this->belongsTo(ProductAttributeValue::class);
    }

    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
