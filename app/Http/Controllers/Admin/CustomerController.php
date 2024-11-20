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
        $customer = User::findOrFail($id);

        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $customer->update($request->all());

        // Trả về thông tin cập nhật mới nhất
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công!',
            'data' => $customer // Trả về đối tượng customer đã được cập nhật
        ]);
    }
}
