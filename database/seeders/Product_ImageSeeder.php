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
                // Lenovo
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
                [
                    'productID' => 4,
                    'image_url' => '/storage/images/1730902052LenovoLegion5Y7000P16IRX92024.jpg',
                    'desc' => 'Lenovo Legion 5 Y7000P 16IRX9 2024',
                    'type' => 'main',
                ],
                [
                    'productID' => 5,
                    'image_url' => '/storage/images/1730903894LenovoThinkpadX1NanoGen1.jpg',
                    'desc' => 'Lenovo Thinkpad X1 Nano Gen 1',
                    'type' => 'main',
                ],
                [
                    'productID' => 6,
                    'image_url' => '/storage/images/1730903997LenovoThinkPadE15Gen4Corei71260PRam16GBSSD512GB.jpg',
                    'desc' => 'Lenovo ThinkPad E15 Gen 4 i7 1260P Ram 16GB SSD 512GB',
                    'type' => 'main',
                ],

                // Dell
                [
                    'productID' => 7,
                    'image_url' => '/storage/images/1730904140DellInspiron1474402in12024.jpg',
                    'desc' => 'Dell Inspiron 14 7440 2in1 2024',
                    'type' => 'main',
                ],
                [
                    'productID' => 8,
                    'image_url' => '/storage/images/1730904531DellInspiron16Plus7640.jpg',
                    'desc' => 'Dell Inspiron 16 Plus 7640 (2024)',
                    'type' => 'main',
                ],
                [
                    'productID' => 9,
                    'image_url' => '/storage/images/1730904716DellPrecision5570.jpg',
                    'desc' => 'Dell Precision 5570',
                    'type' => 'main',
                ],
                [
                    'productID' => 10,
                    'image_url' => '/storage/images/1730904786MSICreatorM1616.jpg',
                    'desc' => 'MSI Creator M16 16',
                    'type' => 'main',
                ],
                [
                    'productID' => 11,
                    'image_url' => '/storage/images/1730907023AcerPredatorHelisNeo16PHN167291RF.jpg',
                    'desc' => 'MSI Creator M16 B13VE-830VN',
                    'type' => 'main',
                ],
                [
                    'productID' => 12,
                    'image_url' => '/storage/images/1730905623MSIVECTORGP68HX12VH070VN.jpg',
                    'desc' => 'MSI VECTOR GP68 HX 12VH 070VN',
                    'type' => 'main',
                ],
                [
                    'productID' => 13,
                    'image_url' => '/storage/images/1730906221HPEnvyx3602in114-fa0013dx2024.jpg',
                    'desc' => 'HP Envy x360 2in1 14-fa0013dx (2024)',
                    'type' => 'main',
                ],
                [
                    'productID' => 14,
                    'image_url' => '/storage/images/1730906041ge79aqm51355hpenvyx3602in114es1013dx2024.jpg',
                    'desc' => 'HP Envy x360 2-in-1 14-es1013dx 2024',
                    'type' => 'main',
                ],
                [
                    'productID' => 15,
                    'image_url' => '/storage/images/1730906367HPOMENLaptop16.jpg',
                    'desc' => 'HP OMEN Laptop 16',
                    'type' => 'main',
                ],
                [
                    'productID' => 16,
                    'image_url' => '/storage/images/17309067591709548420_2679_e3a518c4a4cd2eccb613ae71273ca9bd.jpg',
                    'desc' => 'Acer Predator Triton 14 PT14-51-78B4',
                    'type' => 'main',
                ],
                [
                    'productID' => 17,
                    'image_url' => '/storage/images/1730907053AcerNitro5Tiger222AN515-58.jpg',
                    'desc' => 'Acer Nitro 5 Tiger 2022 AN515-58',
                    'type' => 'main',
                ],
                [
                    'productID' => 18,
                    'image_url' => '/storage/images/1730907023AcerPredatorHelisNeo16PHN167291RF.jpg',
                    'desc' => 'Acer Predator Helios Neo 16-PHN16-72-91RF',
                    'type' => 'main',
                ],
            ]
        );
    }
}
