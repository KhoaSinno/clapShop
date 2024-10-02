# Documentation

+ Link Plan: `<https://docs.google.com/spreadsheets/d/14FsP_WT7bO9Px5cJIJGaz0Ljs5mbC_g9_CklYtxpvKM/edit?usp=sharing>`

+ Link SRC: `<https://drive.google.com/drive/folders/1iz-iIZITxwT4mafGzPmvLm0ycVzTC_sE?usp=drive_link>`

# Account: `Username` | `Password`

+ `ADMIN:` sinoo | 123456
+ `CUSTOMER:` teo | cus123

# Công việc các thành viên

### `1. Anh Khoa - HTTT2211026`

+ Thành lập dự án, khởi tạo và thiết lập môi trường
+ Chọn `template` Admin và Customer
+ Phân `chia route` cho Admin và Customer
+ `Hiển thị/ Update khách hàng` với ajax
+ `Thiết kế database`

### `2. Thành Đạt - HTTT2211003`

+ Do something...

### `3. Như Ý - HTTT2211015`

+ Do this.. do that...
+ `Thiết kế database`

### `4. Thành Phát - HTTT2211004`

+ Dou someone...

### `5. Trường Nguyên - HTTT2211025`

+ Admin: code Sản phẩm: Thêm/ Sửa/ Xóa
+ `Thiết kế database`

# Refresh database

php artisan migrate:fresh

php artisan db:seed

## Bước chạy dự án (Bạn nào note lại push lên đi)

1.

2.

3.

### Tại sao cần CSRF?

+ CSRF (Cross-Site Request Forgery) là một loại tấn công mà hacker lợi dụng người dùng đã đăng nhập vào hệ thống, sau đó tự động gửi yêu cầu đến server của bạn mà người dùng không biết. Hacker có thể thực hiện các hành động trái phép (như xóa tài khoản, chuyển tiền, v.v.).

+ Laravel bảo vệ bạn khỏi loại tấn công này bằng cách sử dụng CSRF token. Token này là một chuỗi duy nhất được tạo cho mỗi phiên người dùng và chỉ hợp lệ với người dùng đó. Khi thực hiện các yêu cầu như POST, PUT, DELETE, Laravel kiểm tra token này để đảm bảo rằng yêu cầu đến từ một trang hợp lệ và không phải từ hacker.

+ Do đó, khi gửi các yêu cầu thay đổi dữ liệu như DELETE hay POST, bạn cần gửi kèm CSRF token để đảm bảo tính bảo mật.

## Configuration

+ BS4 - V4.1.1

### `Create dummy data`

php artisan db:seed

php artisan make:seeder *(name of seed)Seeder

php artisan db:seed --class=*(name of seed)Seeder

### `Load file auto in lavarel`

+ composer dump-autoload

Bước 1
composer update
composer install

Bước 2
php artisan config:clear
php artisan cache:clear
php artisan config:cache

## Kế sách cuối cùng

### `Reset cache`

php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
