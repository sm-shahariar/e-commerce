<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $guarded = [];

    // protected $casts = [
    //     'value' => 'array',
    // ];
    
    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
