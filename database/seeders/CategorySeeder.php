<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Lenovo',
            'slug' => Str::slug('Lenovo')
        ]);

        Category::create([
            'name' => 'Asus',
            'slug' => Str::slug('Asus')
        ]);

        Category::create([
            'name' => 'HP',
            'slug' => Str::slug('HP')
        ]);

        Category::create([
            'name' => 'Acer',
            'slug' => Str::slug('Acer')
        ]);

        Category::create([
            'name' => 'Macbook',
            'slug' => Str::slug('Macbook')
        ]);
    }
}
