# Fresh database

php artisan migrate:fresh

php artisan db:seed

# Account: `Username` | `Password`

-   `ADMIN:` sinoo | 123456
-   `CUSTOMER:` teo | cus123

# Documentation

-   Link Plan: `<https://docs.google.com/spreadsheets/d/14FsP_WT7bO9Px5cJIJGaz0Ljs5mbC_g9_CklYtxpvKM/edit?usp=sharing>`

-   Link Dữ liệu mẫu: `https://docs.google.com/spreadsheets/d/1O18eoNwREFU0ARyQGcHxTNt9ueVI0rz5opADQSRVpv4/edit?usp=drive_link`

-   Link SRC: `<https://drive.google.com/drive/folders/1iz-iIZITxwT4mafGzPmvLm0ycVzTC_sE?usp=drive_link>`

# Công việc các thành viên

### `1. Anh Khoa - HTTT2211026`

-   Thành lập dự án, khởi tạo và thiết lập môi trường
-   Chọn `template` Admin và Customer
-   Phân `chia route` cho Admin và Customer
-   `Hiển thị/ Update khách hàng` với ajax
-   `Thiết kế database`
-   Train và hỗ trợ cho mọi người
-   Tối ưu lại Routes

### `2. Thành Đạt - HTTT2211003`

-   Admin: code Đơn hàng: Thêm/ Sửa/ Xác nhận/ Hủy
-   Admin: code Danh mục: Thêm/ Sửa/ Xóa

### `3. Như Ý - HTTT2211015`

-   `Thiết kế database`

    #### `>>>Doing:`

-   Note các bước đã thực hiện ở bên dưới này t có viết sẵn rồi đó

-   Train cho Phát: Cách chạy khi có src và khi mới pull code về

### `4. Thành Phát - HTTT2211004`

-   Lấy Hình ảnh + Nội dung
-   Làm ProductSeeder

### `5. Trường Nguyên - HTTT2211025`

-   `Thiết kế database`
-   Admin: code Sản phẩm: Thêm/ Sửa/ Xóa

-   Suy nghĩ cách nếu như nhập hàng thì sửa phần sổ lượng sản phẩm hay cách nào khác mà đỡ phức tạp

### `5. Trường Nguyên - HTTT2211025`

-   Admin: code Sản phẩm: Thêm/ Sửa/ Xóa
-   `Thiết kế database`

# Refresh database

```bash

php artisan migrate:fresh

php artisan db:seed
```

## Bước chạy dự án (Bạn nào note lại push lên đi)

## Bước chạy dự án Ý note lại đi

1.

2.

3.

## Tại sao cần CSRF?

-   CSRF (Cross-Site Request Forgery) là một loại tấn công mà hacker lợi dụng người dùng đã đăng nhập vào hệ thống, sau đó tự động gửi yêu cầu đến server của bạn mà người dùng không biết. Hacker có thể thực hiện các hành động trái phép (như xóa tài khoản, chuyển tiền, v.v.).

-   Laravel bảo vệ bạn khỏi loại tấn công này bằng cách sử dụng CSRF token. Token này là một chuỗi duy nhất được tạo cho mỗi phiên người dùng và chỉ hợp lệ với người dùng đó. Khi thực hiện các yêu cầu như POST, PUT, DELETE, Laravel kiểm tra token này để đảm bảo rằng yêu cầu đến từ một trang hợp lệ và không phải từ hacker.

-   Do đó, khi gửi các yêu cầu thay đổi dữ liệu như DELETE hay POST, bạn cần gửi kèm CSRF token để đảm bảo tính bảo mật.

## Configuration

-   BS4 - V4.1.1

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




Note's Nguyên kĩ thuật `symbolic link`:
php artisan storage:link : thêm link cho nơi lưu trữ file
```
