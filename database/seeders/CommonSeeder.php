<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProductAttribute;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\ProductAttributeValue;
use Illuminate\Support\Facades\Hash;

class CommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '01947116736',
            'password' => Hash::make('12345678'),
            'role' => 1,
        ]);

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


        ProductAttribute::create([
            'name' => 'Size'
        ]);

        ProductAttribute::create([
            'name' => 'Color'
        ]);

        ProductAttributeValue::create([
            'value' => 'Small',
        ]);

        ProductAttributeValue::create([
            'value' => 'Red',
        ]);

        ProductAttributeValue::create([
            'value' => 'Green',
        ]);

        ProductAttributeValue::create([
            'value' => 'Black',
        ]);

    }
}
