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
        ]);

        $size = Size::create([ //ID = 2
            'size_value' => "S",
        ]);

        $size = Size::create([ //ID = 3
            'size_value' => "M",
        ]);

        $size = Size::create([ //ID = 4
            'size_value' => "L",
        ]);

        $size = Size::create([ //ID = 5
            'size_value' => "XXL",
        ]);

        $size = Size::create([ //ID = 6
            'size_value' => "XXXL",
        ]);

        $size = Size::create([ //ID = 7
            'size_value' => "XXXXL",
        ]);

    }
}
