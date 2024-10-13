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
                'categoryID' => 1,
                'name' => 'Lenovo ThinkBook 14P Gen 2',
                'cpu' => 'AMD Ryzen 7 5800H (8 nhân 16 luồng, xung nhịp cơ bản 3.2GHz, tối đa 4.4GHz, 4MB L2 Cache / 16MB L3 Cache)',
                'ram' => '16GB DDR4 3200MHz dual channel',
                'storage' => '512GB PCIe NVMe M.2 SSD gen 4',
                'screen' => '14" 2.2K (2240x1400), IPS, 300nits, 60Hz, 100% sRGB, Dolby Vision',
                'battery' => '61Wh',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '<h2>Đặc điểm nổi bật</h2>
                
            <p><em><strong>Lenovo Thinkbook 14P Gen 2</strong>&nbsp;- Thiết bị l&agrave;m việc hiệu năng cao, thiết kế gọn nhẹ cực kỳ ph&ugrave; hợp với những nh&agrave; s&aacute;ng tạo nội dung hoặc những người d&ugrave;ng c&oacute; c&ocirc;ng việc đ&ograve;i hỏi phải di chuyển giữa nhiều địa điểm. Nếu bạn cũng đang t&igrave;m kiếm cho m&igrave;nh một thiết bị l&agrave;m việc sở hữu những ưu điểm n&agrave;y th&igrave; h&atilde;y xem ngay b&agrave;i viết dưới đ&acirc;y của&nbsp;<strong>T&amp;T Center</strong>, để đưa ra quyết định nh&eacute;!</em></p>

            <h2><strong>Đ&aacute;nh gi&aacute; Lenovo Thinkbook 14P Gen 2 -&nbsp; Thiết kế đơn giản v&agrave; tinh tế</strong></h2>

            <h3><strong>Ngoại h&igrave;nh hiện đại, t&iacute;nh di&nbsp;động cao</strong></h3>

            <p><strong>Lenovo Thinkbook 14P Gen 2</strong>&nbsp;được thiết kế từ kim loại, c&aacute;c chi tiết c&oacute; độ ho&agrave;n thiện cao, mang đến diện mạo cao cấp, sang trọng. Mặt lưng m&agrave;u x&aacute;m được c&aacute;ch điệu th&agrave;nh 2 mảng đậm nhạt tạo sự kh&aacute;c biệt cho chiếc laptop n&agrave;y.&nbsp;B&ecirc;n cạnh đ&oacute;, độ mỏng nhẹ cũng l&agrave; điểm cộng khi độ mỏng chỉ 16,9mm v&agrave; trọng lượng chỉ 1.4 kg cho ph&eacute;p người d&ugrave;ng mang theo bất cứ đ&acirc;u.&nbsp;</p>

            <p><img alt="Ngoại hình hiện đại, tính linh động cao" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2014P%20Gen%203/15.jpg" /></p>

            <h3><strong>Hiển thị ấn tượng với m&agrave;n h&igrave;nh 2.2K</strong></h3>

            <p><strong>Thinkbook 14P Gen 2</strong>&nbsp;sở hữu m&agrave;n h&igrave;nh 14 inch với độ ph&acirc;n giải 2.2K, &nbsp;độ phủ m&agrave;u 100% sRGB mang đến khả năng hiển thị cực sắc n&eacute;t, m&agrave;u sắc rực rỡ, sống động. Ngo&agrave;i ra, m&agrave;n h&igrave;nh của chiếc laptop n&agrave;y c&ograve;n được phủ một lớp chống ch&oacute;i Anti Glare kết hợp với độ s&aacute;ng 300 nits gi&uacute;p người d&ugrave;ng l&agrave;m việc trong m&ocirc;i trường &aacute;nh s&aacute;ng mạnh một c&aacute;ch thoải m&aacute;i m&agrave; kh&ocirc;ng bị ch&oacute;i mắt.&nbsp;</p>

            <p><img alt="Hiển thị ấn tượng với màn hình 2.2K " src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2014P%20Gen%203/1.png" /></p>

            <h3><strong>Sức mạnh vượt trội, xử l&yacute; nhanh nhạy</strong></h3>

            <p><strong>Lenovo Thinkbook 14P Gen 2</strong>&nbsp;được trang bị con chip AMD Ryzen 7 6800H với 8 nh&acirc;n v&agrave; 16 luồng tốc độ tối đa l&ecirc;n đến 4.50 GHz mang đến khả năng xử l&yacute; v&ocirc; c&ugrave;ng mạnh mẽ. Kết hợp với card đồ họa AMD Radeon 680M gi&uacute;p m&aacute;y c&oacute; khả năng l&agrave;m c&aacute;c c&ocirc;ng việc li&ecirc;n quan đến đồ họa một c&aacute;ch nhẹ nh&agrave;ng.&nbsp;</p>

            <p><img alt="Sức mạnh vượt trội, xử lý nhanh nhạy" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2014P%20Gen%203/9.png" /></p>

            <p>B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n sở hữu RAM 16GB DDR5 6400MHz cho khả năng đa nhiệm mượt m&agrave;, chạy nhiều t&aacute;c vụ c&ugrave;ng l&uacute;c m&agrave; kh&ocirc;ng bị đơ, lag. C&ugrave;ng với ổ cứng SSD 512GB, tạo kh&ocirc;ng gian lưu trữ rộng lớn, đồng thời gi&uacute;p m&aacute;y khởi động, truy xuất dữ liệu một c&aacute;ch nhanh ch&oacute;ng.</p>

            <h3><strong>Trải nghiệm an to&agrave;n v&agrave; bảo mật</strong></h3>

            <p>Mang đến cho người d&ugrave;ng trải nghiệm chất lượng v&agrave; an to&agrave;n,&nbsp;<strong>Lenovo Thinkbook 14P Gen 2</strong>&nbsp;được trang bị cảm biến v&acirc;n tay t&iacute;ch hợp tr&ecirc;n ph&iacute;m nguồn v&agrave; nhận diện khu&ocirc;n mặt webcam c&oacute; độ ph&acirc;n giải Full HD cho ph&eacute;p người d&ugrave;ng đăng nhập v&agrave;o m&aacute;y m&agrave; kh&ocirc;ng cần nhập mật khẩu, vừa nhanh ch&oacute;ng tiện lợi vừa n&acirc;ng cao t&iacute;nh bảo mật.&nbsp;</p>

            <p><img alt="Trải nghiệm an toàn và bảo mật " src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2014P%20Gen%203/14.jpg" /></p>

            <h3><strong>Kết nối đa dạng</strong></h3>

            <p>Tuy c&oacute; thiết kế mỏng nhẹ nhưng&nbsp;<strong>Thinkbook 14P Gen 2</strong>&nbsp;được trang bị rất nhiều cổng kết nối gi&uacute;p người d&ugrave;ng kết nối linh hoạt với c&aacute;c thiết bị ngoại vi kh&aacute;c. C&aacute;c cổng kết nối của chiếc laptop bao gồm: 2 cổng USB 3.2, 2 cổng USB Type-C, cổng HDMI 2.0, khe cắm MicroSD v&agrave; jack tai nghe.&nbsp;</p>

            <p><img alt="Kết nối đa dạng" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2014P%20Gen%203/16.jpg" /></p>',
                'price' => 15490000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 1,
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
                'categoryID' => 1,
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
                'categoryID' => 1,
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
