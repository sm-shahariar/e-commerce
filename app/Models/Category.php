<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => 'string', // Explicitly cast status as string
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
