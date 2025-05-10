<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Media\HasMedia;
use App\Media\Mediable;

class Product extends Model
{
    use HasMedia;

    protected $guarded = [];

    protected $appends = ['thumbnail', 'images'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    

    public function setThumbnailAttribute($file)
    {
        if ($file) {
            $existingMedia = $this->media()->where('collection_name', 'thumbnail')->first();

            if ($existingMedia) {
                $this->deleteMedia($existingMedia->id);
            }

            $this->addMedia($file, 'thumbnail', []);
        }
    }
    

    public function getThumbnailAttribute()
    {
       return $this->getFirstUrl('thumbnail');
    }

    public function setImagesAttribute($file) {
        
        if ($file) {
            $this->addMedia($file, 'images', []);
        }
    }

    public function getImagesAttribute()
    {
        return $this->getUrl('images');
    }




    
}
