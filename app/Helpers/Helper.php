<?php

if (!function_exists('format_currencyVNĐ')) {
    function format_currencyVNĐ($number)
    {
        // Đảm bảo giá trị là một số trước khi định dạng
        $number = is_numeric($number) ? (float)$number : 0;

        // Định dạng số thành tiền Việt Nam Đồng (VNĐ)
        return number_format($number, 0, ',', '.') . 'đ';
    }
}
