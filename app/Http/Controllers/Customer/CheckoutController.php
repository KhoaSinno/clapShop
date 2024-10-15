<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart');
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }
        $cartTotal = format_currencyVNĐ($cartTotal);
        return view('customer.checkout.index',[
            'cart' => $cart,
            'cartTotal' => $cartTotal
        ]);
    }
    public function checkout(Request $request)
    {
        return view('customer.checkout.payment');
    }

}
