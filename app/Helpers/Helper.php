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

function returnCssStatus($status)
{
    $status = strtolower($status);

    if ($status == 'pending') {
        return 'text-warning';
    } elseif ($status == 'success') {
        return 'text-success';
    }
}


function returnStatus($status)
{
    $statusText = '';
    switch ($status) {
        case 'pending':
            $statusText = 'Đang xử lý';
            break;
        case 'success':
            $statusText = 'Đã giao hàng';
            break;
        default:
            $statusText = 'Không xác định';
            break;
    }
    return $statusText;
}
