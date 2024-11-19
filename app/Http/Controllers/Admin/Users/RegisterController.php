<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Đăng kí tài khoản',
        ]);
    }

    public function store(Request $request)
    {
        // Valid dữ liệu nhập vào
        $this->validate($request, [
            'username' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:6',
            'fullname' => 'required|string|max:150',
            'phone' => 'nullable|string|max:20|unique:users',
            // 'email' => 'required|email|unique:users',
            // 'address' => 'required|string|max:255',
            // 'gender' => 'nullable|string|in:Nam,Nữ',
            // 'dateOfBirth' => 'nullable|date|before:today',
        ]);

        // Lưu thông tin người dùng vào cơ sở dữ liệu
        $user = new User(); // Khởi tạo đối tượng User mới
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        // $user->email = $request->email;
        // $user->address = $request->address;
        // $user->gender = $request->gender;
        // $user->dateOfBirth = $request->dateOfBirth;
        $user->role = 'customer'; // Vai trò mặc định là khách hàng khi ĐK tạo TK
        $user->save();

        // Đăng nhập người dùng luôn sau khi đăng ký thành công
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công! Bạn có thể đăng nhập ngay bây giờ.');
    }
}
