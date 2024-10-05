<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'categoryID' => 1,
            'name' => 'Lenovo Thinkbook 16 G6+ 2024',
            'cpu' => 'Intel Ultra 7 155H (3.8 GHz up to 4.8 Hz, 16 Cores, 22 Threads, 24MB Cache)',
            'ram' => '32GB DDR5 5600MHz',
            'storage' => '1TB SSD PCIe 4.0',
            'screen' => '16" 2.5K (2560x1600) IPS, 350nits, 100% sRGB, 120Hz, TCON',
            'battery' => '4 cell',
            'warranty' => '2 năm',
            'os' => 'Windows 11 bản quyền',
            'description' => '',
            'price' => 27590000,
            'stock' => 1,
            'active' => true,
        ]);

        Product::insert([
            [
                'categoryID' => 1,
                'name' => 'Lenovo Thinkbook 16 G6+ 2024',
                'cpu' => 'Intel Ultra 7 155H',
                'ram' => '32GB DDR5 5600MHz',
                'storage' => '1TB SSD PCIe 4.0',
                'screen' => '16" 2.5K (2560x1600)',
                'battery' => '4 cell',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 27590000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 2,
                'name' => 'Lenovo ThinkBook 14P Gen 2',
                'cpu' => 'AMD Ryzen 7 5800H (8 nhân 16 luồng, xung nhịp cơ bản 3.2GHz, tối đa 4.4GHz, 4MB L2 Cache / 16MB L3 Cache)',
                'ram' => '16GB DDR4 3200MHz dual channel',
                'storage' => '512GB PCIe NVMe M.2 SSD gen 4',
                'screen' => '14" 2.2K (2240x1400), IPS, 300nits, 60Hz, 100% sRGB, Dolby Vision',
                'battery' => '61Wh',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 15490000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 3,
                'name' => 'Lenovo Legion 5 Y7000P 16IRX9 2024',
                'cpu' => 'Intel 14th Gen i7-14650HX, 16C (8P + 8E), 24T, P-core up to 5.2GHz, E-core up to 3.7GHz, 30MB Cache',
                'ram' => '16GB DDR5',
                'storage' => '512GB M.2 PCIe NVMe SSD',
                'screen' => '16" WQXGA (2560×1600) IPS 500nits, 100% sRGB, 165Hz, DisplayHDR 400, Dolby Vision, G-SYNC',
                'battery' => '80Whr, 3-Cell',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 16990000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 4,
                'name' => 'Lenovo Thinkpad X1 Nano Gen 1',
                'cpu' => 'Core i7-1160G7 (4 nhân, 8 luồng)',
                'ram' => '16GB LPDDR4',
                'storage' => '512GB SSD M.2 PCIe',
                'screen' => '13.3" 2K, 450nits, 100% sRGB',
                'battery' => '48WHrs',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 18790000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 5,
                'name' => 'Lenovo ThinkPad E15 Gen 4 i7 1260P Ram 16GB SSD 512GB',
                'cpu' => 'Core i7-1260P - 2.1GHz',
                'ram' => '16GB DDR4 (8GB onboard + 8GB slot) 3200MHz',
                'storage' => '512GB SSD NVMe PCIe',
                'screen' => '15.6" Full HD (1920x1080)',
                'battery' => '45Wh',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 25090000,
                'stock' => 1,
                'active' => true,
            ]
        ]);
    }
}
