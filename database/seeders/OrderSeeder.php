<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Danh sách đơn hàng mẫu
        $orders = [
            [
                'id' => 1,
                'customerID' => 2,
                'adminID' => 1,
                'address' => '123 Main Street',
                'totalQuantity' => 5,
                'totalPrice' => 101650000,
                'note' => 'Giao hàng nhanh.',
                'paymentMethod' => 'bank_transfer',
                'status' => 'success',
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
            [
                'id' => 2,
                'customerID' => 2,
                'adminID' => 1,
                'address' => '456 Elm Street',
                'totalQuantity' => 3,
                'totalPrice' => 16990000,
                'note' => 'Để lại trước cửa.',
                'paymentMethod' => 'cod',
                'status' => 'success',
                'created_at' => now()->subMonths(1),
                'updated_at' => now()->subMonths(1),
            ],
            [
                'id' => 3,
                'customerID' => 3,
                'adminID' => 1,
                'address' => '789 Pine Street',
                'totalQuantity' => 4,
                'totalPrice' => 42990000,
                'note' => 'Liên hệ trước khi giao.',
                'paymentMethod' => 'cod',
                'status' => 'success',
                'created_at' => now()->subMonths(3),
                'updated_at' => now()->subMonths(3),
            ],
            [
                'id' => 4,
                'customerID' => 3,
                'adminID' => 1,
                'address' => '321 Maple Avenue',
                'totalQuantity' => 2,
                'totalPrice' => 21980000,
                'note' => 'Giao trong giờ hành chính.',
                'paymentMethod' => 'cod',
                'status' => 'success',
                'created_at' => now()->subMonths(4),
                'updated_at' => now()->subMonths(4),
            ],
            [
                'id' => 5,
                'customerID' => 2,
                'adminID' => 1,
                'address' => '555 Oak Lane',
                'totalQuantity' => 1,
                'totalPrice' => 15990000,
                'note' => 'Hàng dễ vỡ, xin nhẹ tay.',
                'paymentMethod' => 'bank_transfer',
                'status' => 'success',
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
            [
                'id' => 6,
                'customerID' => 2,
                'adminID' => 1,
                'address' => '555 Oak Lane Mexico',
                'totalQuantity' => 10,
                'totalPrice' => 204900000,
                'note' => 'Hàng dễ vỡ, xin nhẹ tay.',
                'paymentMethod' => 'cod',
                'status' => 'success',
                'created_at' => now()->subMonths(6),
                'updated_at' => now()->subMonths(6),
            ],
            [
                'id' => 7,
                'customerID' => 2,
                'adminID' => 1,
                'address' => '256 NVC Street',
                'totalQuantity' => 10,
                'totalPrice' => 204900000,
                'note' => 'Hàng dễ vỡ, xin nhẹ tay.',
                'paymentMethod' => 'bank_transfer',
                'status' => 'success',
                'created_at' => now()->subMonths(7),
                'updated_at' => now()->subMonths(7),
            ],
            [
                'id' => 8,
                'customerID' => 3,
                'adminID' => 1,
                'address' => '123 Oakel Lane',
                'totalQuantity' => 20,
                'totalPrice' => 598800000,
                'note' => 'Hàng dễ vỡ, xin nhẹ tay.',
                'paymentMethod' => 'cod',
                'status' => 'success',
                'created_at' => now()->subMonths(8),
                'updated_at' => now()->subMonths(8),
            ],
            [
                'id' => 9,
                'customerID' => 3,
                'adminID' => 1,
                'address' => '116 Balance Street',
                'totalQuantity' => 20,
                'totalPrice' => 447900000,
                'note' => 'Hàng dễ vỡ, xin nhẹ tay.',
                'paymentMethod' => 'cod',
                'status' => 'success',
                'created_at' => now()->subMonths(9),
                'updated_at' => now()->subMonths(9),
            ],
        ];


        // Danh sách chi tiết đơn hàng mẫu
        $orderDetails = [
            [
                'orderID' => 1,
                'productID' => 1,
                'quantity' => 2,
                'price' => 27590000,
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
            [
                'orderID' => 1,
                'productID' => 3,
                'quantity' => 3,
                'price' => 15490000,
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
            [
                'orderID' => 2,
                'productID' => 4,
                'quantity' => 1,
                'price' => 16990000,
                'created_at' => now()->subMonths(1),
                'updated_at' => now()->subMonths(1),
            ],
            [
                'orderID' => 3,
                'productID' => 5,
                'quantity' => 2,
                'price' => 21495000,
                'created_at' => now()->subMonths(3),
                'updated_at' => now()->subMonths(3),
            ],
            [
                'orderID' => 3,
                'productID' => 6,
                'quantity' => 2,
                'price' => 21495000,
                'created_at' => now()->subMonths(3),
                'updated_at' => now()->subMonths(3),
            ],
            [
                'orderID' => 4,
                'productID' => 7,
                'quantity' => 2,
                'price' => 10990000,
                'created_at' => now()->subMonths(4),
                'updated_at' => now()->subMonths(4),
            ],
            [
                'orderID' => 5,
                'productID' => 8,
                'quantity' => 1,
                'price' => 15990000,
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
            [
                'orderID' => 6,
                'productID' => 17,
                'quantity' => 10,
                'price' => 20490000,
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
            [
                'orderID' => 7,
                'productID' => 17,
                'quantity' => 10,
                'price' => 20490000,
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
            [
                'orderID' => 8,
                'productID' => 18,
                'quantity' => 10,
                'price' => 35390000,
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
            [
                'orderID' => 8,
                'productID' => 16,
                'quantity' => 10,
                'price' => 24490000,
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
            [
                'orderID' => 9,
                'productID' => 13,
                'quantity' => 10,
                'price' => 16890000,
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
            [
                'orderID' => 9,
                'productID' => 10,
                'quantity' => 10,
                'price' => 27900000,
                'created_at' => now()->subMonths(5),
                'updated_at' => now()->subMonths(5),
            ],
        ];


        // Chèn dữ liệu vào bảng orders
        DB::table('orders')->insert($orders);

        // Chèn dữ liệu vào bảng order_details
        DB::table('order__details')->insert($orderDetails);
    }
}
