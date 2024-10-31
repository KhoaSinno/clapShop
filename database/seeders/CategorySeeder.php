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
            'slug' => Str::slug('Lenovo'),
            'imgURL' => 'storage/images/ZndMP77bnUS2arqKeal8VOI54yza18RvnZaDnZWC.png'
        ]);

        // 2
        Category::create([
            'name' => 'Dell',
            'slug' => Str::slug('Dell'),
            'imgURL' => 'storage/images/0KDFKb1eJOzeVpPo3ZLa2gDWlQgcph5nWjZZWfua.png'
        ]);

        // 3
        Category::create([
            'name' => 'MSI',
            'slug' => Str::slug('MSI'),
            'imgURL' => 'storage/images/jUkXJz2SNzJXZk589Vn02lFL01opem4Ceo1fI1Mo.png'
        ]);

        // 4
        Category::create([
            'name' => 'HP',
            'slug' => Str::slug('HP'),
            'imgURL' => 'storage/images/cWjMHrsK8SQ8ejybzE7u2NuWP1KEhqTpXZhUgDQc.png'
        ]);

        // 5
        Category::create([
            'name' => 'Acer',
            'slug' => Str::slug('Acer'),
            'imgURL' => 'storage/images/5KzgTR4tLJee5WmGHU9sGnhjHgvrqeuIi1JrfBdw.png'
        ]);
    }
}
