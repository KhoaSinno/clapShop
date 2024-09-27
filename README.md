- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=clapShop
- DB_USERNAME=root
- DB_PASSWORD=

1. php artisan migrate

2. php artisan tinker

3. echo bcrypt('123456');

## Tại sao cần CSRF?

- CSRF (Cross-Site Request Forgery) là một loại tấn công mà hacker lợi dụng người dùng đã đăng nhập vào hệ thống, sau đó tự động gửi yêu cầu đến server của bạn mà người dùng không biết. Hacker có thể thực hiện các hành động trái phép (như xóa tài khoản, chuyển tiền, v.v.).

- Laravel bảo vệ bạn khỏi loại tấn công này bằng cách sử dụng CSRF token. Token này là một chuỗi duy nhất được tạo cho mỗi phiên người dùng và chỉ hợp lệ với người dùng đó. Khi thực hiện các yêu cầu như POST, PUT, DELETE, Laravel kiểm tra token này để đảm bảo rằng yêu cầu đến từ một trang hợp lệ và không phải từ hacker.

- Do đó, khi gửi các yêu cầu thay đổi dữ liệu như DELETE hay POST, bạn cần gửi kèm CSRF token để đảm bảo tính bảo mật.

### BS4 - V4.1.1

php artisan make:seeder UserSeeder
php artisan db:seed --class=UserSeeder

composer dump-autoload

### Tạo middleware

php artisan make:middleware RoleMiddleware

### Reset cache

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
