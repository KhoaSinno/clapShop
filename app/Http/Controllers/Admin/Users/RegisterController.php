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
        // Xác thực dữ liệu nhập vào
        $this->validate($request, [
            'username' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:6',
            'fullname' => 'required|string|max:150',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string|max:20|unique:users',
            'address' => 'required|string|max:255', // Đã sửa chính tả từ 'adress' thành 'address'
            'gender' => 'nullable|string|in:Nam,Nữ',
            'dateOfBirth' => 'nullable|date|before:today', // Sửa 'before:date' thành 'before:today' để kiểm tra ngày hợp lệ
        ]);

        // Lưu thông tin người dùng vào cơ sở dữ liệu
        $user = new User(); // Khởi tạo đối tượng User mới
        $user->username = $request->username;
        $user->password = bcrypt($request->password); // Băm mật khẩu
        $user->fullname = $request->fullname; // Đừng quên thêm fullname
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address; // Sửa chính tả từ 'adress' thành 'address'
        $user->gender = $request->gender;
        $user->dateOfBirth = $request->dateOfBirth;
        $user->role = 'customer'; // Gán vai trò cho người dùng nếu cần
        $user->save();

        // Đăng nhập người dùng (nếu cần)
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công! Bạn có thể đăng nhập ngay bây giờ.');
    }

}
