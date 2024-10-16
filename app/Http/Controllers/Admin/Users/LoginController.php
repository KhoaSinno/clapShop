<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail\ForgotPassword;
// use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;


class LoginController extends Controller 
{
    public function index()
    {
        return view('login', [
            'title' => 'Đăng nhập hệ thống',
        ]);
    }

    ///////////////////
    public function show()
    {
        return view('forget', [
            'title' => 'Quên mật khẩu',
        ]);
    }
    public function forget(Request $request){
        $client = new Client();
        $url = "https://sandbox.api.mailtrap.io/api/send/3212526";
        $payload = [
            "from" => [
                "email" => "hello@example.com",
                "name" => "Mailtrap Test"
            ],
            "to" => [
                [
                    "email" => "vonguyen040704@gmail.com"
                ]
            ],
            "subject" => "You are awesome!",
            "text" => "Này là OTP của bạn:",
            "category" => "Integration Test"
        ];

        $headers = [
            "Authorization" => "Bearer ", // Thay thế YOUR_API_KEY bằng token của bạn
            "Content-Type" => "application/json"
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'json' => $payload
        ]);

        // Xử lý phản hồi
        $responseData = json_decode($response->getBody(), true);


        return view('login', [
            'title' => '$responseData',
        ]);
    }
    /////////////////////////////////

    // public function store(Request $request)
    // {
    //     // dd($request->input());
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt([
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //         // role = 1 is admin check hear
    //     ], $request->input('remember'))) {

    //         return redirect()->route('admin');
    //     };

    //     return redirect()->back();
    // }

    // public function store(Request $request)
    // {

    //     // dd($request->input());

    //     // Validate dữ liệu nhập vào
    //     $this->validate($request, [
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     // Xác thực đăng nhập với username và password
    //     if (Auth::attempt([
    //         'username' => $request->input('username'),
    //         'password' => $request->input('password')
    //     ], $request->filled('remember'))) {
    //         // Nếu đăng nhập thành công, chuyển hướng về trang admin
    //         return redirect()->route('admin');
    //     }

    //     // Nếu đăng nhập không thành công, quay lại trang trước đó
    //     return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
    // }


    // Check role

    public function store(Request $request) 
    {
        $this->validate($request, rules: [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ], $request->has('remember'))) {

            // Kiểm tra vai trò
            if (Auth::user()->role === 'admin') {
                // return redirect()->route('admin.dashboard'); // Giao diện admin
                return redirect()->route('admin.customer'); // Giao diện admin

            }
            // Giao diện customer
            return redirect('/'); // Giao diện khách hàng
        }

        return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Xóa tất cả session

        $request->session()->regenerateToken(); // Tạo token CSRF mới

        return redirect('/')->with('success', 'Đăng xuất thành công!'); // Chuyển hướng về trang đăng nhập
    }

}
