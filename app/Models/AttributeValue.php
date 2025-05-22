<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $guarded = [];

    // protected $casts = [
    //     'value' => 'array',
    // ];
    
    public function Attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
