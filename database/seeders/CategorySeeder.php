<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory(25)->create();

        $category = Category::create([ //ID = 1
            'name'             => "Formal",
            'description'      => 'Formal wear or full dress is the Western dress code category for the most formal events, including weddings, religious events, confirmations, funerals, Easter and Christmas traditions, as well as certain state dinners, audiences, balls, and horse racing events.',
            // 'create_user_id'   => null,
        ]);

        $category = Category::create([ //ID = 2
            'name'             => "Casual",
            'description'      => 'Casual wear is a Western dress code that is informal, occasional, spontaneous, and comfortable for daily use. Following the counterculture of the 1960s, casual clothes became popular in the Western world. When highlighting the comfort of casual attire, it may be referred to as loungewear or leisurewear. Casual is "informal" in the sense that it is not formal, but traditionally, "informal attire" refers to a Western dress code with suits that is one step below "semi-formal attire," making it more formal than "casual attire".',
            // 'create_user_id'   => null,
        ]);

        $category = Category::create([ //ID = 3
            'name'             => "Sports Wear",
            'description'      => 'The term "sportswear" or "activewear" refers to apparel, including footwear, worn for sports or physical exercise. Most sports and physical activities require specialized gear for practical, comfort, and safety reasons.',
            // 'create_user_id'   => null,
        ]);

    }
}
