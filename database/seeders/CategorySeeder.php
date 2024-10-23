<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use tidy;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // 1
        Category::create([
            'name' => 'Lenovo',
            'slug' => Str::slug('Lenovo')
        ]);

        // 2
        Category::create([
            'name' => 'Dell',
            'slug' => Str::slug('Dell')
        ]);

        // 3
        Category::create([
            'name' => 'MSI',
            'slug' => Str::slug('MSI')
        ]);

        // 4
        Category::create([
            'name' => 'HP',
            'slug' => Str::slug('HP')
        ]);

        // 5
        Category::create([
            'name' => 'Acer',
            'slug' => Str::slug('Acer')
        ]);
    }
}
