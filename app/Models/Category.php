<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Media\HasMedia;

class Category extends Model
{
    use HasMedia;
    
    protected $guarded = [];

    protected $appends = ['image'];

    protected $casts = [
        'status' => 'string', // Explicitly cast status as string
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function setImageAttribute($file){
        if ($file){
            $this->deleteMedia();
        }

        $this->addMedia($file, 'image', []);
    }

    public function getImageAttribute(){
        return $this->getFirstUrl('image');
    }
}
