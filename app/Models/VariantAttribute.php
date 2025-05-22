<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    protected $guarded = [];

    
    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    public function values()
    {
        return $this->hasMany(VariantAttributeValue::class);
    }

    
}
