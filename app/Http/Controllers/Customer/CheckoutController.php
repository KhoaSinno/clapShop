<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('customer.checkout.index');
    }
    public function checkout(Request $request)
    {
        return view('customer.checkout.payment');
    }

}
