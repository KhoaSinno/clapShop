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
            'description' => '<p>Sở hữu những ưu điểm nổi bật về ngoại h&igrave;nh, hiệu năng, cũng như khả năng hiển thị, laptop&nbsp;<strong>Lenovo Thinkbook 16&nbsp;G6+&nbsp;2024</strong>&nbsp;l&agrave; một gợi &yacute; ho&agrave;n hảo d&agrave;nh cho c&aacute;c nh&agrave; s&aacute;ng tạo nội dung, d&acirc;n đồ họa, lập tr&igrave;nh vi&ecirc;n.</p>

            <h3><strong>Thiết kế hiện đại, sang trọng</strong></h3>

            <p><strong>Lenovo Thinkbook 16&nbsp;G6+ 2024&nbsp;</strong>mang đến cho người d&ugrave;ng những trải nghiệm mới mẻ với thiết kế sang trọng v&agrave; hiện đại. Bề mặt m&aacute;y được phủ lớp sơn bạc tinh tế, c&aacute;ch điệu với 2 tone m&agrave;u đậm nhạt, logo được đặt ở vị tr&iacute; nổi bật gi&uacute;p n&acirc;ng tầm đẳng cấp.</p>

            <p><img alt="Thiết kế hiện đại, sang trọng" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2016%20G6%2B%202024/lenovo-thinkbook-16-G6%2B-2024-ttcenter-1.jpg" /></p>

            <p><strong>Thinkbook 16 G6+&nbsp;2024 Ultra 7&nbsp;155H</strong>&nbsp;c&oacute; trọng lượng 1.7kg, tuy kh&ocirc;ng phải l&agrave; d&ograve;ng sản phẩm mỏng nhẹ nhất đến từ thương hiệu Lenovo nhưng vẫn đảm bảo được t&iacute;nh linh động, người d&ugrave;ng&nbsp;dễ d&agrave;ng mang theo trong những cuộc họp hay những chuyến c&ocirc;ng t&aacute;c xa m&agrave; kh&ocirc;ng gặp qu&aacute; nhiều kh&oacute; khăn.</p>

            <h3><strong>Hiệu năng cải tiến</strong></h3>

            <p><strong>Lenovo Thinkbook 16 G6+&nbsp;2024</strong>&nbsp;được trang bị con chip Intel Core Ultra 7&nbsp;155H mới t&iacute;ch hợp với card đồ họa Intel Arc Graphics, mang đến hiệu năng mạnh mẽ, khả năng xử l&yacute; đồ họa vượt trội, m&aacute;y c&oacute; thể chỉnh sửa h&igrave;nh ảnh, render video hoặc chơi game một c&aacute;ch mượt m&agrave;, kh&ocirc;ng độ trễ.</p>

            <p><img alt="Hiệu năng cải tiến" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2016%20G6%2B%202024/lenovo-thinkbook-16-G6%2B-2024-ttcenter-6.jpg" /></p>

            <p>Với bộ nhớ RAM 32GB DDR5 đảm bảo khả năng đa nhiệm, cho ph&eacute;p người d&ugrave;ng mở nhiều t&aacute;c vụ đồng thời m&agrave; kh&ocirc;ng xảy ra hiện tượng đơ, lag. SSD 1TB vừa cung cấp bộ nhớ lớn thoải m&aacute;i lưu trữ dữ liệu vừa gi&uacute;p m&aacute;y khởi động nhanh, đọc ghi dữ liệu trong nh&aacute;y mắt.</p>

            <p><a href="https://ttcenter.com.vn/lenovo-legion"><em><strong>&gt;&gt; Xem th&ecirc;m:</strong>&nbsp;C&aacute;c d&ograve;ng laptop gaming&nbsp;<strong>Lenovo Legion</strong>&nbsp;ngoại h&igrave;nh chất, cấu h&igrave;nh khủng</em></a></p>

            <h3><strong>M&agrave;n h&igrave;nh 2.5K sắc n&eacute;t</strong></h3>

            <p><strong>Thinkbook 16 G6+&nbsp;</strong>được trang bị m&agrave;n h&igrave;nh 16 inch với độ ph&acirc;n giải 2.5K c&ugrave;ng dải m&agrave;u 100% sRGB mang đến cho người d&ugrave;ng trải nghiệm xem ho&agrave;n hảo, mọi h&igrave;nh ảnh đều được hiển thị sắc n&eacute;t, m&agrave;u sắc sống động như thật. Ngo&agrave;i ra, chiếc laptop Thinkpad n&agrave;y c&ograve;n sở hữu tần số qu&eacute;t 120Hz, gi&uacute;p c&aacute;c chuyển động trong c&aacute;c trận game &nbsp;trở n&ecirc;n mượt m&agrave; v&agrave; cực th&iacute;ch mắt.</p>

            <p><img alt="Màn hình 2.5K sắc nét" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2016%20G6%2B%202024/lenovo-thinkbook-16-G6%2B-2024-ttcenter-2.jpg" /></p>

            <h3><strong>Thời lượng pin 85Whr thoải m&aacute;i sử dụng</strong></h3>

            <p><strong>Thinkbook G6+&nbsp;2024 Intel Ultra 7&nbsp;155H</strong>&nbsp;sở hữu vi&ecirc;n pin c&oacute; dung lượng 85Whr, một con số ấn tượng ở d&ograve;ng ultrabook. Với dung lượng n&agrave;y, người d&ugrave;ng thoải m&aacute;i sử dụng laptop để l&agrave;m việc, giải tr&iacute; cơ bản trong thời gian d&agrave;i m&agrave; kh&ocirc;ng cần phải sạc pin li&ecirc;n tục.</p>

            <p><img alt="Thời lượng pin 85Whr, thoải mái sử dụng" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Thinkbook%2016%20G6%2B%202024/lenovo-thinkbook-16-G6%2B-2024-ttcenter-4.jpg" /></p>

            <h3><strong>Tản nhiệt tối t&acirc;n</strong></h3>

            <p>Để đảm bảo thiết bị lu&ocirc;n hoạt động một c&aacute;ch hiệu quả,&nbsp;<strong>Lenovo Thinkbook 16 G6+&nbsp;2024</strong>&nbsp;được trang bị hệ thống tản nhiệt th&ocirc;ng minh v&agrave; hiện đại. Với c&ocirc;ng nghệ Smart Power 3.0 cho ph&eacute;p hệ thống tự động điều chỉnh c&ocirc;ng suất v&agrave; quạt l&agrave;m m&aacute;t dựa tr&ecirc;n nhu cầu của m&aacute;y, nhờ đ&oacute; m&aacute;y lu&ocirc;n được duy tr&igrave; nhiệt độ ph&ugrave; hợp kể cả khi l&agrave;m việc, giải tr&iacute; với c&aacute;c t&aacute;c vụ nặng.</p>',
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
                'active' => false,
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
                'description' => '<p><em><strong>Lenovo Legion Y7000P 2024 Core i7 - 14650HX</strong>&nbsp;- Si&ecirc;u phẩm Gaming được cộng đồng game thủ đ&oacute;n chờ nhất 2024. Với sức mạnh vượt trội từ con chip Core i7 - 14650HX c&ugrave;ng card đồ họa RTX 4060, hứa hẹn mang đến cho anh em game thủ trải nghiệm chiến game đỉnh cao. Để kh&aacute;m ph&aacute; hết sức mạnh của &ldquo;cỗ m&aacute;y&rdquo; chiến game n&agrave;y h&atilde;y tham khảo ngay b&agrave;i viết m&agrave;&nbsp;<strong>T&amp;T Center</strong>&nbsp;đ&atilde; tổng hợp dưới đ&acirc;y nh&eacute;!</em></p>

                <h2><strong>Đ&aacute;nh gi&aacute; Lenovo Legion Y7000P 2024 Core i7 - 14650HX &ndash; Ấn tượng, cuốn h&uacute;t, hiệu năng mạnh mẽ</strong></h2>

                <h3><strong>Qu&aacute;i vật hiệu năng</strong></h3>

                <p><strong>Lenovo Legion Y7000P 2024 Core i7 - 14650HX&nbsp;</strong>được trang bị bộ xử l&yacute; Core i7-14650HX mới, với 16 l&otilde;i v&agrave; 24 luồng, tần số turbo l&otilde;i đơn c&oacute; thể đạt tới 5,2 GHz. Với th&ocirc;ng số ấn tượng, chiếc laptop n&agrave;y c&oacute; khả năng xử l&yacute; mạnh mẽ, mọi t&aacute;c vụ nặng như đồ họa, render video,...đến những tựa game hot đều được vận h&agrave;nh một c&aacute;ch trơn tru mượt m&agrave;.</p>

                <p><img alt="Quái vật hiệu năng" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Legion%20Y7000P%202024%20Core%20i7%20-%2014650HX/lg24%20(1).jpg" /></p>

                <p>Ngo&agrave;i ra,&nbsp;<strong>Lenovo Legion Y7000P 16IRX9 2024 Core i7 - 14650HX</strong>&nbsp;c&ograve;n sở hữu RAM 16GB v&agrave; SSD 512GB mang đến khả năng đa nhiệm mạnh mẽ, khởi động m&aacute;y, hay truy xuất v&agrave;o c&aacute;c ứng dụng đều v&ocirc; c&ugrave;ng nhanh ch&oacute;ng. Chưa hết, m&aacute;y c&ograve;n được trang bị Card RTX 4060 hiệu suất đồ họa đỉnh cao, bạn thỏa sức l&agrave;m đồ họa, chiến game m&agrave; kh&ocirc;ng phải lo lắng bất k&igrave; điều g&igrave;.</p>

                <h3><strong>Thiết kế mạnh mẽ, cuốn h&uacute;t</strong></h3>

                <p>Cũng như c&aacute;c phi&ecirc;n bản tiền nhiệm,&nbsp;<strong>Lenovo Legion 5 2024</strong>&nbsp;sở hữu ngoại h&igrave;nh cứng c&aacute;p, mạnh mẽ chuẩn gaming với m&agrave;u đen sang trọng, cuốn h&uacute;t. Tuy nhi&ecirc;n, điều kh&aacute;c biệt ở phi&ecirc;n bản n&agrave;y l&agrave; lỗ tho&aacute;t kh&iacute; được nh&agrave; sản xuất bố tr&iacute; về ph&iacute;a sau thay v&igrave; hai b&ecirc;n m&aacute;y như c&aacute;c phi&ecirc;n bản trước, điều n&agrave;y gi&uacute;p cho kiểu d&aacute;ng của m&aacute;y trở n&ecirc;n độc đ&aacute;o v&agrave; hiện đại hơn.</p>

                <p><img alt="Thiết kế mạnh mẽ, cuốn hút" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Legion%20Y7000P%202024%20Core%20i7%20-%2014650HX/5.jpg" /></p>

                <h3><strong>M&agrave;n h&igrave;nh hiển thị đẹp mắt</strong></h3>

                <p><strong>Lenovo Legion Y7000P 2024 Core i7 - 14650HX</strong>&nbsp;được trang bị m&agrave;n h&igrave;nh 16 inch chất lượng cao với độ ph&acirc;n giải ấn tượng 2560&times;1600, tốc độ l&agrave;m mới l&ecirc;n đến 165Hz, độ s&aacute;ng 500 nits mang đến trải nghiệm xem ho&agrave;n hảo, mọi h&igrave;nh ảnh đều được hiển thị sắc n&eacute;t v&agrave; v&ocirc; c&ugrave;ng đẹp mắt.</p>

                <p><em><strong>&gt;&gt; Xem th&ecirc;m:&nbsp;</strong>C&aacute;c mẫu&nbsp;<strong><a href="https://ttcenter.com.vn/laptop-do-hoa-ky-thuat">Laptop đồ họa&nbsp;</a></strong>gi&aacute; rẻ, cấu h&igrave;nh cao tại T&amp;T Center&nbsp;</em></p>

                <p><img alt="Màn hình hiển thị đẹp mắt" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Legion%20Y7000P%202024%20Core%20i7%20-%2014650HX/1.jpg" /></p>

                <h3><strong>Tản nhiệt mạnh mẽ</strong></h3>

                <p>Về khả năng tản nhiệt của&nbsp;<strong>Lenovo Legion 5 2024&nbsp;</strong>cũng v&ocirc; c&ugrave;ng vượt trội. M&aacute;y sở hữu kiến tr&uacute;c tản nhiệt Savior Qiankun, loại bỏ cửa tho&aacute;t kh&iacute; ở hai b&ecirc;n thay v&agrave;o đ&oacute; l&agrave; cửa tho&aacute;t kh&iacute; ở ph&iacute;a sau, đồng thời tối ưu cửa tho&aacute;t kh&iacute; v&agrave; ống dẫn kh&iacute; b&ecirc;n trong, nhờ đ&oacute; hiệu suất giải ph&oacute;ng nhiệt vượt xa c&aacute;c phương ph&aacute;p truyền thống, vừa hạn chế tiếng ồn một c&aacute;ch tối đa.</p>

                <p><img alt="Tản nhiệt mạnh mẽ" src="https://www.ttcenter.com.vn/uploads/images/S%E1%BA%A2N%20PH%E1%BA%A8M/Lenovo%20Legion%20Y7000P%202024%20Core%20i7%20-%2014650HX/7.jpg" /></p>

                <h2><strong>V&igrave; sao n&ecirc;n sở hữu&nbsp;Lenovo Legion Y7000P 2024 Core i7 - 14650HX ngay l&uacute;c n&agrave;y&nbsp;?</strong></h2>

                <p>Với những th&ocirc;ng số ấn tượng như tr&ecirc;n th&igrave; chẳng c&oacute; g&igrave; phải b&agrave;n cải về hiệu năng của chiếc laptop Gaming&nbsp;<strong>Lenovo Legion Y7000P 2024 Core i7 - 14650HX</strong>. Nếu bạn đang t&igrave;m kiếm cho m&igrave;nh chiếc laptop mạnh mẽ, m&agrave;n h&igrave;nh chất lượng, tản nhiệt hiệu quả th&igrave; đ&acirc;y l&agrave; một gợi &yacute; tuyệt vời.</p>',
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
            ],

            // Dell
            [
                'categoryID' => 2,
                'name' => 'Dell Inspiron 14 7440 2in1 2024',
                'cpu' => 'Intel Core 5 120U, 10 nhân (2P + 8E) / 12 luồng, P-core 1.4 / 5.0GHz, E-core 900MHz / 3.8GHz, 12MB',
                'ram' => '8GB DDR5 5200MHz',
                'storage' => '512GB M.2 PCIe NVMe SSD',
                'screen' => '14.0inch FHD+ (1920 x 1200) 60Hz,250 nits',
                'battery' => '4Cell',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 16990000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 2,
                'name' => 'Dell Inspiron 16 Plus 7640 (2024)',
                'cpu' => 'Intel Core Ultra 9-185H (16 Cores, 22 Threads, Upto 5.1GHz, 24MB Cache)',
                'ram' => '32GB LPDDR5x 6400MHz',
                'storage' => '1TB, M.2, PCIe NVMe, SSD',
                'screen' => '16.0-inch 16:10 FHD+ (1920 x 1200) Touch 300nits WVA Display with ComfortView Plus Support',
                'battery' => '6 Cell, 90 Wh, integrated',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 26990000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 2,
                'name' => 'Dell Precision 5570',
                'cpu' => 'Core™ i7-12800H, vPro® (14 core, 20 thread, 2.40 to 4.80 GHz Turbo, 24MB cache)',
                'ram' => '32GB DDR5 4800 MHz',
                'storage' => 'SSD 1TB M.2 2280 NVMe',
                'screen' => '15.6″ Ultrasharp UHD+ HDR400, 3840×2400,Touch, w/Prem Panel Guar, 100% Adobe, 500 nits',
                'battery' => '6 cell - 68 WHr',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 38990000,
                'stock' => 1,
                'active' => true,
            ],
            // MSI
            [
                'categoryID' => 3,
                'name' => 'MSI Creator M16 16',
                'cpu' => '13th Gen Intel Core i7-13620H (24MB Cache, 10 cores, 16 threads, up to 4.9GHz Turbo)',
                'ram' => '32GB LPDDR5 5200MHz',
                'storage' => '1TB NVMe SSD',
                'screen' => '16″ QHD+ (2560 x 1600), 100% DCI-P3',
                'battery' => '65WHrs',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 27900000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 3,
                'name' => 'MSI Creator M16 B13VE-830VN',
                'cpu' => 'Intel, Core i7, 13700H',
                'ram' => '16 GB, DDR5, 5200 MHz',
                'storage' => 'SSD 512 GB',
                'screen' => '16.0 inch, 1920 x 1200 Pixels, IPS, 144, IPS',
                'battery' => ' 53WHrs',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 34990000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 3,
                'name' => 'MSI VECTOR GP68 HX 12VH 070VN',
                'cpu' => 'Bộ xử lý Intel® Core™ i9-12900HX',
                'ram' => ' RAM 16GB DDR5 4800MHz',
                'storage' => 'SSD 1TB NVMe PCIe Gen4x4',
                'screen' => '16.0Inch FHD+ IPS 144Hz 16:10',
                'battery' => '4Cell 90WHrs',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 38990000,
                'stock' => 1,
                'active' => true,
            ],

            // HP
            [
                'categoryID' => 4,
                'name' => 'HP Envy x360 2in1 14-fa0013dx (2024)',
                'cpu' => 'AMD Ryzen™ 5 8640HS (up to 4.9 GHz, 16 MB L3 cache, 6 cores, 12 threads)',
                'ram' => '16GB LPDDR5 6400MHz (Onboard)     ',
                'storage' => '512 GB PCIe® NVMe™ M.2 SSD',
                'screen' => '14" diagonal, WUXGA (1920 x 1200), multitouch-enabled, IPS, edge-to-edge glass, micro-edge 300 nits',
                'battery' => '3-cell, 59 Wh',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 16890000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 4,
                'name' => 'HP Envy x360 2-in-1 14-es1013dx 2024',
                'cpu' => 'Intel Core 5 120U (10 cores/ 12 threads, up to 5 GHz, 12MB Cache)',
                'ram' => '8GB DDR4 3200MHz',
                'storage' => '512GB M.2 PCIe NVMe SSD',
                'screen' => '14-inch FHD (1920 x 1080) Touch-Screen, IPS, edge-to-edge glass, micro-edge',
                'battery' => '3 Cells, 43Wh',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 14990000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 4,
                'name' => 'HP OMEN Laptop 16',
                'cpu' => 'Intel® Core™ i5-13500HX (up to 4.7 GHz with Intel® Turbo Boost Technology, 24 MB L3 cache, 14 cores, 20 threads)
(Disclaimer 2a)',
                'ram' => '16 GB DDR5-5600 MHz',
                'storage' => '512 PCIe® Gen4 NVMe™ TLC M.2 SSD',
                'screen' => '16.1" diagonal, QHD - 2K (2560 x 1440), 240 Hz, 3 ms response time, IPS, micro-edge, anti-glare, Low Blue Light, 300 nits',
                'battery' => '6-cell, 83 Wh Li-ion polymer',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 24990000,
                'stock' => 1,
                'active' => true,
            ],

            // Acer
            [
                'categoryID' => 5,
                'name' => 'Acer Predator Triton 14 PT14-51-78B4',
                'cpu' => 'Intel Core i7 13th Gen 13700H (2.40GHz) Raptor Lake 14-core (6P+8E) Processor',
                'ram' => '16GB DDR5 4800MHz',
                'storage' => '512GB PCIe NVMe SSD ',
                'screen' => '14 inch WUXGA (1920x1200) IPS 165Hz SlimBezel, 100% sRGB, Acer ComfyView, 400nit Brightness',
                'battery' => '4-cell, 230W',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 24490000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 5,
                'name' => 'Acer Nitro 5 Tiger 2022 AN515-58',
                'cpu' => 'Core i7 - 12700H (6 Nhân hiệu năng cao, 8 Nhân tiết kiệm điện)',
                'ram' => '8GB DDR4 3200Mhz (2 khe ram DDR4 max 32GB)',
                'storage' => 'SSD 512GB NVMe+ 1 Khe SSD M2 Nvme+ 1 Khe 2,5 inchs Sata',
                'screen' => '15.6 inchs, FHD (1920 x 1080), IPS, 144Hz, LCD',
                'battery' => '4 Cell 57Wh',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 20490000,
                'stock' => 1,
                'active' => true,
            ],
            [
                'categoryID' => 5,
                'name' => 'Acer Predator Helios Neo 16-PHN16-72-91RF',
                'cpu' => 'Intel Core i9-14900HX (16 Cores/ 24 Threads, up to 5.80 GHz, 36MB',
                'ram' => '16 GB DDR5 5600MHz',
                'storage' => '1TB PCIe4',
                'screen' => '16" WQXGA (2560 x 1600), IPS 240Hz, sRGB 100%, 500 nits',
                'battery' => '4 cell, 90Whr',
                'warranty' => '2 năm',
                'os' => 'Windows 11 bản quyền',
                'description' => '',
                'price' => 35390000,
                'stock' => 1,
                'active' => true,
            ]


        ]);
    }
}
