<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
<<<<<<< HEAD
    //
=======
    public function index()
    {
        return view('customer.checkout.index');
    }
    public function checkout(Request $request)
    {
        return view('customer.checkout.payment');
    }
>>>>>>> 43d007ae8e232b9507bf4172dbdbe89c72cfad3a
}
