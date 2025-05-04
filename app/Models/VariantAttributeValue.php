<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttributeValue extends Model
{
    protected $guarded = [];
    
    public function productAttributeValue()
    {
        return $this->belongsTo(ProductAttributeValue::class);
    }

    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
