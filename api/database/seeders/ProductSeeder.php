<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                "title"=> "iPhone 9",
                "description"=> "An apple mobile which is nothing like apple",
                "price"=> 549,
                "category"=> "smartphones",
            ],
            [
                "title"=> "iPhone X",
                "description"=> "SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A12 Bionic chip with ...",
                "price"=> 899,
                "category"=> "smartphones",
            ],
            [
                "title"=> "Samsung Universe 9",
                "description"=> "Samsung's new variant which goes beyond Galaxy to the Universe",
                "price"=> 1249,
                "category"=> "smartphones",
            ],
            [
                "title"=> "OPPOF19",
                "description"=> "OPPO F19 is officially announced on April 2021.",
                "price"=> 280,
                "category"=> "smartphones",
            ],
            [
                "title"=> "Huawei P30",
                "description"=> "Huawei’s re-badged P30 Pro New Edition was officially unveiled yesterday in Germany and now the device has made its way to the UK.",
                "price"=> 499,
                "category"=> "smartphones",
            ],
            [
                "title"=> "MacBook Pro",
                "description"=> "MacBook Pro 2021 with mini-LED display may launch between September, November",
                "price"=> 1749,
                "category"=> "laptops",
            ]
        ]);
    }
}
