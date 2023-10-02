<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'src' => "http://via.placeholder.com/920x613?text=product1",
            ],
            [
                 'product_id' => 2,
                 'src' => "https://via.placeholder.com/920x613?text=product2"
            ],
            [
                'product_id' => 3,
                 'src' => "https://via.placeholder.com/920x613?text=product3"
            ],
            [
                'product_id' => 4,
                'src' => "https://via.placeholder.com/920x613?text=product4"
            ],
            [
                'product_id' => 5,
                'src' => "https://via.placeholder.com/920x613?text=product5"
            ],
            [
                'product_id' => 6,
                'src' => "https://via.placeholder.com/920x613?text=product6"
            ],
        ]);
    }
}
