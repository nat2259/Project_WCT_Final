<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\ProductDetail;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create categories
        Category::create(['name_category' => 'Vegetables']);
        Category::create(['name_category' => 'Fruits']);
        Category::create(['name_category' => 'Juice']);
        Category::create(['name_category' => 'Dried']);

        // Create products using your exact format
        ProductDetail::create([
            'product_name' => 'Bell Pepper',
            'discount' => 30,
            'cost' => 80.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-1.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Strawberry',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 2,
            'available' => true,
            'image' => 'images/product-2.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Green Beans',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-3.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Purple Cabbage',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-4.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Tomatoe',
            'discount' => 30,
            'cost' => 80.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-5.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Brocolli',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-6.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Carrots',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-7.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Fruit Juice',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 3,
            'available' => true,
            'image' => 'images/product-8.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Onion',
            'discount' => 30,
            'cost' => 80.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-9.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Apple',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 2,
            'available' => true,
            'image' => 'images/product-10.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Garlic',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-11.jpg'
        ]);

        ProductDetail::create([
            'product_name' => 'Chilli',
            'discount' => 0,
            'cost' => 120.00,
            'category_id' => 1,
            'available' => true,
            'image' => 'images/product-12.jpg'
        ]);


        // Additional 7 products
        ProductDetail::create([
            'product_name' => 'Banana',
            'discount' => 15,
            'cost' => 60.00,
            'category_id' => 2,
            'available' => true,
            'image' => 'images/Banana.jpeg'
        ]);

        ProductDetail::create([
            'product_name' => 'Orange',
            'discount' => 0,
            'cost' => 90.00,
            'category_id' => 2,
            'available' => true,
            'image' => 'images/Orange.jfif'
        ]);

        ProductDetail::create([
            'product_name' => 'Orange Juice',
            'discount' => 10,
            'cost' => 95.00,
            'category_id' => 3,
            'available' => true,
            'image' => 'images/OrangeJuice.webp'
        ]);

        ProductDetail::create([
            'product_name' => 'Apple Juice',
            'discount' => 0,
            'cost' => 85.00,
            'category_id' => 3,
            'available' => true,
            'image' => 'images/AppleJuice.webp'
        ]);

        ProductDetail::create([
            'product_name' => 'Dried Apricots',
            'discount' => 20,
            'cost' => 150.00,
            'category_id' => 4,
            'available' => true,
            'image' => 'images/DriedApricots.jfif'
        ]);

        ProductDetail::create([
            'product_name' => 'Dried Mango',
            'discount' => 0,
            'cost' => 180.00,
            'category_id' => 4,
            'available' => true,
            'image' => 'images/DriedMango.webp'
        ]);

        ProductDetail::create([
            'product_name' => 'Raisins',
            'discount' => 10,
            'cost' => 100.00,
            'category_id' => 4,
            'available' => true,
            'image' => 'images/Raisins.jfif'
        ]);
   
    }
    
}