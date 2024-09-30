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
            'customers' => $cus
        ]);
    }
    public function edit($id)
    {
        $customer = User::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }


    public function update(Request $request, $id)
    {
        $customer = User::find($id);
        $customer->fullname = $request->input('fullname');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->dateOfBirth = $request->input('dateOfBirth');
        $customer->gender = $request->input('gender');
        $customer->save();

        return response()->json(['message' => 'Cập nhật thành công']);
    }
}
