<?php

if (!function_exists('format_currency')) {
    function format_currencyVNĐ($number)
    {
        // Định dạng số thành tiền Việt Nam Đồng (VNĐ)
        return number_format($number, 0, ',', '.') . ' VNĐ';
    }
}
