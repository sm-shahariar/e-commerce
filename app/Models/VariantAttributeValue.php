<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttributeValue extends Model
{
    protected $guarded = [];
    
    public function value()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function variantAttribute() {
        return $this->belongsTo(VariantAttribute::class, 'variant_attribute_id');
    }
}
