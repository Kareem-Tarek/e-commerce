<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory(25)->create();

        $product = \App\Models\Product::create([
            'name'             => "Dark Fresh Casual",
            'slug'             => '12345',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/men-1.jpg',
            'price'            => 340,
            'sale_price'       => 300,
            'product_category' => 'men',
        ]);

        $product = \App\Models\Product::create([
            'name'             => "Men's Suit - Dark Red",
            'slug'             => '68471',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/suit-male2.jpg',
            'price'            => 560,
            'sale_price'       => 510,
            'product_category' => 'men',
        ]);

        $product = \App\Models\Product::create([
            'name'             => "Men's Suit - Black",
            'slug'             => '91520',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/suit-male3.jpg',
            'price'            => 530,
            'sale_price'       => 475,
            'product_category' => 'men',
        ]);

        $product = \App\Models\Product::create([
            'name'             => 'Hindi Costume',
            'slug'             => '67890',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/hindi-female.jpg',
            'price'            => 325,
            'sale_price'       => 290,
            'product_category' => 'women',
        ]);

        $product = \App\Models\Product::create([
            'name'             => 'Casual',
            'slug'             => '26519',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/women-01.jpg',
            'price'            => 200,
            'sale_price'       => 185,
            'product_category' => 'women',
        ]);

        $product = \App\Models\Product::create([
            'name'             => 'Dress',
            'slug'             => '10828',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/women-02.jpg',
            'price'            => 235,
            'sale_price'       => 215,
            'product_category' => 'women',
        ]);

        $product = \App\Models\Product::create([
            'name'             => "Girls' Casual Costume",
            'slug'             => '45678',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/casualfemale-kids.jpg',
            'price'            => 195,
            'sale_price'       => 175,
            'product_category' => 'kids',
        ]);
        
        $product = \App\Models\Product::create([
            'name'             => "Boys' Casual Costume",
            'slug'             => '81530',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/casualmale-kids.jpg',
            'price'            => 250,
            'sale_price'       => 225,
            'product_category' => 'kids',
        ]);

        $product = \App\Models\Product::create([
            'name'             => 'Casual kids Costume',
            'slug'             => '79246',
            'description'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'image_name'       => 'assets/images/kid-03.jpg',
            'price'            => 175,
            'sale_price'       => 150,
            'product_category' => 'kids',
        ]);

    }
}
