# Fresh database

php artisan migrate:fresh

php artisan db:seed

# Account: `Username` | `Password`

- `ADMIN:` sinoo | 123456
- `CUSTOMER:` teo | cus123

# Documentation

- Link Plan: `<https://docs.google.com/spreadsheets/d/14FsP_WT7bO9Px5cJIJGaz0Ljs5mbC_g9_CklYtxpvKM/edit?usp=sharing>`

- Link Dữ liệu mẫu: `https://docs.google.com/spreadsheets/d/1O18eoNwREFU0ARyQGcHxTNt9ueVI0rz5opADQSRVpv4/edit?usp=drive_link`

- Link SRC: `<https://drive.google.com/drive/folders/1iz-iIZITxwT4mafGzPmvLm0ycVzTC_sE?usp=drive_link>`

# Công việc các thành viên

### `1. Anh Khoa - HTTT2211026`###
- Setup dự án, khởi tạo và thiết lập môi trường
- Chọn template: Admin và Customer
- Phân chia route cho: Admin và Customer
- Hiển thị/ Update khách hàng với ajax
- Thiết kế database
- Tiếp tục: Tối ưu các routes
- Merge code vào branch main
- Dùng "booted" trong service hiển thị thông tin khi vào website UI: Customer
- Base session để thêm/ xóa item trong giỏ hàng
- Lọc sản phẩm khi bấm vào Category
- Phần giao diện cart: Làm mịn lại để đẹp mắt hơn
- Cập nhật số lượng bằng cách bấm nút Update và lưu số lượng vào session, sau đó phần tổng giá sẽ tăng theo
- Chỉnh nội dung trang contact
- Code phần thanh toán
- Phần Order ở customer và admin
- Viết chức năng sửa, xóa, xem Admin: Order
- Lên content cho slide
### `1. Anh Khoa - HTTT2211026`###

### `2. Thành Đạt - HTTT2211003`###
- Admin: code Danh mục: Thêm/ Sửa/ Xóa
- Nảy ra idea về phân bố bố cục (Trang chủ, sản phẩm, liên hệ)
- Lead: Chỉnh sửa template (Trang chủ, sản phẩm, liên hệ)
- Đưa ra màu chủ đạo
- Logo: ClapShop (Chữ hay Ảnh hay Vector)
- Nảy ra idea
- Lead: Chỉnh sửa template (Cart, thanh toán)
- Thêm cột hình ảnh ở Cart
- Vietsub lại phần header và footer
- Admin: Thêm/ xoá hình ảnh Category và duyệt hình ảnh ra
- 1 Banner to chính ở trang chủ: 870 x 431
- 2 Banner nhỏ: 570 x 270
- 1 breadcrum: 1950 x 20
- 1 icon title web
- Đưa ra idea 
- Làm phần Dashboard báo cáo ở phần admin
- Thiết kế slide
### `2. Thành Đạt - HTTT2211003`###

### `3. Như Ý - HTTT2211015`###
- Thiết kế database
- Hiển thị danh mục trang chủ
- Làm phần seeder product
- Làm trang register
- Chỉnh sửa UI 
- Customer: Profile user
- Thuyết trình, báo cáo với cô
### `3. Như Ý - HTTT2211015`###

### `4. Thành Phát - HTTT2211004`###
- Làm ProductSeeder
- Lấy Hình ảnh + Nội dung
- Xử lý và tạo UI 404 not found ở route ngoài những route được định nghĩa trong web.php
- Sửa lại tên hình ảnh (Bị lỗi khi truy xuất thông qua tên hình ảnh nên cần Phát sửa lại
 sửa lại hình trong git ấy, ròi push lên lại)
 - VietSub lại phần footer giống thương  mại đt
### `4. Thành Phát - HTTT2211004`###

### `5. Trường Nguyên - HTTT2211025`
- Thiết kế database
- Admin: code Sản phẩm: Thêm/ Sửa/ Xóa
- Dùng seeder import data vào
- Hoàn thiện chức năng lọc sản phẩm theo giá
- Forgot password
- Change password
- Đưa ra idea làm phần POS bán hàng
- Train cho mọi người và tự tìm hiểu để cover:
+ Luồng hoạt động
+ Cách thức áp dụng công nghệ ntn
- Test phần order Customer và Admin
- Test thanh toán ở customer
- Pos admin
### `5. Trường Nguyên - HTTT2211025`

- Admin: code Sản phẩm: Thêm/ Sửa/ Xóa
- `Thiết kế database`

## Bước chạy dự án (NhuY)

## Bước chạy dự án Ý note lại đi

## Như Ý note

1. Cài đặt môi trường

- Cài đặt Laragon.
- Tìm và chọn template thích hợp cho dự án.
- Tạo 1 thư mục mới. Nếu dự án được Clone từ GitHub thì chuyển dự án đến thư mục vừa tạo.
- Mở thư mục dự án trong VS Code, chạy lệnh: cmd -> code

2. Cài đặt cơ sở dữ liệu

- Mở Laragon. Chọn Start All, các dịch vụ Apache, MySQL, PHP sẽ được khởi động. Trên thanh công cụ chọn Database -> Open để truy cập vào phpMyAdmin.
- Tạo cơ sở dữ liệu mới: Database -> create new -> Đặt tên database giống tên trên file .env

3. Kết nối cơ sở dữ liệu:

- Cài đặt môi trường: copy file .env.example -> .env
- Trong file .env cập nhật các thông tin để kết nối cơ sở dữ liệu:
    DB_HOST: 127.0.0.1
    DB_PORT: 3306
    DB_DATABASE:clapshop ( Tên database đã tạo )
    DB_USERNAME: root ( Tên người dùng mặc định của MySQL (root) )
    DB_PASSWORD: ( Mật khẩu để trống nếu dùng Laragon mặc định )

- Trong VS Code , mở terminal -> Git Bash. Chạy các lệnh:

- php artisan migrate hoặc php artisan migrate:fresh ( Tạo bảng )
- php artisan make:seender ( Tạo seender )
- php artisan db:seed ( Chèn dữ liệu mẫu vào cơ sở dữ liệu )

4. Cài đặt các phụ thuộc

- Cài đặt Composer-Setup.exe
- Trong VS Code, mở Terminal -> Git Bash
- Cài đặt dependencies -> chạy lệnh: Composer install

5. Chạy dịch vụ:

- Chạy lệnh: php artisan serve

## Tại sao cần CSRF?

- CSRF (Cross-Site Request Forgery) là một loại tấn công mà hacker lợi dụng người dùng đã đăng nhập vào hệ thống, sau đó tự động gửi yêu cầu đến server của bạn mà người dùng không biết. Hacker có thể thực hiện các hành động trái phép (như xóa tài khoản, chuyển tiền, v.v.).

- Laravel bảo vệ bạn khỏi loại tấn công này bằng cách sử dụng CSRF token. Token này là một chuỗi duy nhất được tạo cho mỗi phiên người dùng và chỉ hợp lệ với người dùng đó. Khi thực hiện các yêu cầu như POST, PUT, DELETE, Laravel kiểm tra token này để đảm bảo rằng yêu cầu đến từ một trang hợp lệ và không phải từ hacker.

- Do đó, khi gửi các yêu cầu thay đổi dữ liệu như DELETE hay POST, bạn cần gửi kèm CSRF token để đảm bảo tính bảo mật.

## Configuration

- BS4 - V4.1.1

### `Create dummy data`

```bash

php artisan db:seed

php artisan make:seeder *(name of seed)Seeder

php artisan db:seed --class=*(name of seed)Seeder
```

### `Load file auto in lavarel`

```bash
  composer dump-autoload

## Kế sách cuối cùng - `Đạt`

Bước 1
composer update
composer install

Bước 2
php artisan config:clear

php artisan cache:clear

php artisan config:cache

php artisan route:clear

php artisan view:clear

```

### Note's Nguyên kĩ thuật `symbolic link` để thêm link cho nơi lưu trữ file

php artisan storage:link
