<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Lenovo']);
        Category::create(['name' => 'Asus']);
        Category::create(['name' => 'HP']);
        Category::create(['name' => 'Acer']);
        Category::create(['name' => 'Macbook']);
    }
}
