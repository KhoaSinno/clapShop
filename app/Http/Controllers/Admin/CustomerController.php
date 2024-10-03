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

    // public function update(Request $request, $id)
    // {
    //     $customer = User::findOrFail($id);

    //     $customer->update($request->all());

    //     return response()->json([
    //         'message' => 'Cập nhật thành công!'
    //     ])->with('success', 'Category created successfully.');
    // }

    public function update(Request $request, $id)
    {
        try {
            // Tìm khách hàng dựa trên ID
            $customer = User::findOrFail($id);

            // Cập nhật thông tin khách hàng
            $customer->update($request->all());

            // Trả về phản hồi JSON với thông báo thành công
            return response()->json([
                'message' => 'Cập nhật thành công!',
                'success' => true
            ]);
        } catch (\Exception $e) {
            // Nếu có lỗi, trả về phản hồi JSON với thông báo lỗi
            return response()->json([
                'message' => 'Đã xảy ra lỗi khi cập nhật!',
                'success' => false
            ], 500);
        }
    }
}
