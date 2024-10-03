<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $cus = User::where('role', 'customer')->get();
        return view('admin.customer.index', [
            'title' => 'Danh sách khách hàng',
            'customers'=> $cus
        ]);
    }
}
