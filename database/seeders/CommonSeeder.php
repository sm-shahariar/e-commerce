<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Attribute;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Hash;

class CommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Category::create([
            'name' => 'Mens Fashion',
            'slug' => 'mens-fashion',
            'status' => '1',
        ]);

        SubCategory::create([
            'name' => 'Shirts',
            'slug' => 'shirts',
            'status' => 1,
            'category_id' => 1,
        ]);


        $size = Attribute::create([
            'name' => 'Size'
        ]);

         AttributeValue::create([
            'name' => 'Small',
            'attribute_id' => $size->id,
        ]);

        AttributeValue::create([
            'name' => 'Medium',
            'attribute_id' => $size->id,
        ]);

        AttributeValue::create([
            'name' => 'Large',
            'attribute_id' => $size->id,
        ]);

        $color = Attribute::create([
            'name' => 'Color',
        ]);

        AttributeValue::create([
            'name' => 'Red',
            'attribute_id' => $color->id,
        ]);

        AttributeValue::create([
            'name' => 'Green',
            'attribute_id' => $color->id,
        ]);

        AttributeValue::create([
            'name' => 'Black',
            'attribute_id' => $color->id,
        ]);

    }
}
