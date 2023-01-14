<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $size = Size::create([ //ID = 1
            'size_value' => "XS",
            'product_id' => 1,
        ]);

        $size = Size::create([ //
            'size_value' => "M",
            'product_id' => 1,
        ]);

        $size = Size::create([ //ID = 2
            'size_value' => "S",
            'product_id' => 2,
        ]);

        $size = Size::create([ //ID = 3
            'size_value' => "M",
            'product_id' => 3,
        ]);

        $size = Size::create([ //ID = 4
            'size_value' => "L",
            'product_id' => 4,
        ]);

        $size = Size::create([ //ID = 5
            'size_value' => "XXL",
            'product_id' => 5,
        ]);

        $size = Size::create([ //ID = 6
            'size_value' => "XXXL",
            'product_id' => 6,
        ]);

        $size = Size::create([ //ID = 7
            'size_value' => "XXXXL",
            'product_id' => 7,
        ]);

    }
}
