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
        // Product::create([
        //     'categoryID ' => '1',
        //     'name' => 'Lenovo Thinkbook 16 G6+ 2024',
        //     'brand' => 'LENOVO',
        //     'cpu' => 'Intel Ultra 7 155H (3.8 GHz up to 4.8 Hz, 16 Cores, 22 Threads, 24MB Cache)',
        //     'ram' => '32GB DDR5 5600MHz',
        //     'storage' => '1TB SSD PCIe 4.0',
        //     'screen_size' => '16" 2.5K (2560x1600) IPS, 350nits, 100% sRGB, 120Hz, TCON',
        //     'battery' => '4 cell',
        //     'warranty' => '2 năm',
        //     'os' => 'Windows 11 bản quyền',
        //     'description' => '',
        //     'price' => '27590000',
        //     'stock' => '1',
        //     'active' => true,
        // ]);

        Product::create(
        //     [
        //     'categoryID' => 1,
        //     'name' => 'Lenovo Thinkbook 16 G6+ 2024',
        //     'brand' => 'LENOVO',
        //     'cpu' => 'Intel Ultra 7 155H',
        //     'ram' => '32GB DDR5 5600MHz',
        //     'storage' => '1TB SSD PCIe 4.0',
        //     'screen_size' => '16" 2.5K (2560x1600)',
        //     'battery' => '4 cell',
        //     'warranty' => '2 năm',
        //     'os' => 'Windows 11 bản quyền',
        //     'description' => '',
        //     'price' => 27590000,
        //     'stock' => 1,
        //     'active' => 1,
        // ], 
        [
            'categoryID' => 2,
            'name' => 'Lenovo ThinkBook 14P Gen 2 ',
            'brand' => 'LENOVO',
            'cpu' => 'AMD Ryzen 7 5800H (8 nhân 16 luồng, xung nhịp cơ bản 3.2GHz, có thể đạt xung nhịp tối đa với Turbo Boost tới 4.4GHz, 4MB L2 Cache / 16MB L3 Cache)',
            'ram' => '16GB DDR4 3200MHz dual channel',
            'storage' => '512GB PCIe® NVMe™ M.2 SSD gen 4',
            'screen_size' => '14inch, 2.2K (2240x1400), IPS, màn nhám không cảm ứng, độ sáng 300nits, tần số 60Hz, tỷ lệ khung hình 16:10, tỷ lệ tương phản 1500:1, độ phủ màu 100%sRGB, công nghệ Auto Display Brightness, Dolby® Vision',
            'battery' => '61wh',
            'warranty' => '2 năm',
            'os' => 'Windows 11 bản quyền',
            'description' => '',
            'price' => 15490000,
            'stock' => 1,
            'active' => 1,
        ],
        [
            'categoryID' => 3,
            'name' => 'Lenovo Legion 5 Y7000P 16IRX9 2024',
            'brand' => 'LENOVO',
            'cpu' => 'Intel 14th Generation Intel® Core™ i7-14650HX, 16C (8P + 8E) / 24T, P-core up to 5.2GHz, E-core up to 3.7GHz, 30MB Cache',
            'ram' => '16GB DDR5 ',
            'storage' => '512GB M.2 PCIe NVMe SSD',
            'screen_size' => '16" WQXGA (2560×1600) IPS 500nits Anti-glare, 100% sRGB, 165Hz, DisplayHDR™ 400, Dolby® Vision™, G-SYNC®, Low Blue Light',
            'battery' => '80Whr, 3-Cell',
            'warranty' => '2 năm',
            'os' => 'Windows 11 bản quyền',
            'description' => '',
            'price' => 16990000,
            'stock' => 1,
            'active' => 1,
        ],
        [
            'categoryID' => 4,
            'name' => 'Lenovo Thinkpad X1 Nano Gen 1',
            'brand' => 'LENOVO',
            'cpu' => 'Core i7-1160G7 (4 nhân, 8 luồng)',
            'ram' => '16GB LPDDR4',
            'storage' => 'SSD M.2 PCIe 512GB',
            'screen_size' => '13.3 inchs 2K, 450 nit, sRGB 100%',
            'battery' => '48WHrs',
            'warranty' => '2 năm',
            'os' => 'Windows 11 bản quyền',
            'description' => '',
            'price' => 18790000,
            'stock' => 1,
            'active' => 1,
        ],
        [
            'categoryID' => 5,
            'name' => 'Lenovo ThinkPad E15 Gen 4 Core i7 1260P Ram 16GB SSD 512GB',
            'brand' => 'LENOVO',
            'cpu' => 'Core i7 - 1260P - 2.1GHz',
            'ram' => '16 GB DDR4 2 khe (8 GB onboard+ 1 khe 8 GB) 3200 MHz',
            'storage' => '512 GB SSD NVMe PCIe',
            'screen_size' => '15.6"Full HD (1920 x 1080)',
            'battery' => '45Wh',
            'warranty' => '2 năm',
            'os' => 'Windows 11 bản quyền',
            'description' => '',
            'price' => 25090000,
            'stock' => 1,
            'active' => 1,
        ]
    );
    }
}