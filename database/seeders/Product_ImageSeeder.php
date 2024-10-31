<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Product_Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product_Image::insert(
            [
                [
                    'productID' => 1,
                    'image_url' => '/storage/images/1728712541Lenovo16G6plus2024.jpg',
                    'desc' => 'Lenovo Thinkbook 16 G6+ 2024',
                    'type' => 'main',
                ],
                [
                    'productID' => 3,
                    'image_url' => '/storage/images/1728712980LenovoThinkBook14PGen2.jpg',
                    'desc' => 'Lenovo Thinkbook 14 gen 2',
                    'type' => 'main',
                ],
            ]
        );
    }
}
