<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail\ForgotPassword;
// use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use App\Models\Password_Reset;
use App\Models\User;

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
    public function forget(Request $request)
    {

        $resetPassword = new Password_Reset();
        $email = $request->input("email"); //email của người dùng

        // Tạo mã OTP
        $otp = Str::random(60);
        $client = new Client();
        $url = "https://send.api.mailtrap.io/api/send";
        $payload = [
            "from" => [
                "email" => "hello@demomailtrap.com",
                "name" => "ClapShop Support"
            ],
            "to" => [
                [
                    "email" => $email
                    // "email" => "vonguyen040704@gmail.com"
                ]
            ],
            "subject" => "Mã OTP cho tài khoản tại ClapShop của bạn tại đây!",
            "text" => "Này là OTP của bạn:" . $otp,
            "category" => "Integration Test"
        ];

        $headers = [
            "Authorization" => "Bearer 393dcd50ffb049818151069cf633e3ff",
            "Content-Type" => "application/json"
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'json' => $payload
        ]);

        // Xử lý phản hồi
        $responseData = json_decode($response->getBody(), true);

        $resetPassword->email = $email;
        $resetPassword->token = $otp;
        $resetPassword->save();

        return view('otp', [
            'title' => 'Lấy lại mật khẩu',
        ]);
    }
    public function checkOTP(Request $request)
    {
        $otp = $request->input("otp"); //otp trong email của người dùng
        $resetPassword = Password_Reset::where('token', $otp)->first();

        try {
            return view('resetpassword', [
                'title' => 'Đặt lại mật khẩu',
                'email' => $resetPassword->email,
            ]);
        } catch (\Throwable $th) {
            return view('otp', [
                'title' => 'Mã OTP chưa đúng',
            ]);
        }
    }
    public function changePassword(Request $request)
    {

        $email = $request->input("email"); // email của người dùng
        $password = $request->input("password"); // password mới của người dùng ()

        //Đổi mật khẩu
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->password = bcrypt($password);
            $user->save();
            return view('login', [
                'title' => 'Đăng nhập',
                //. $resetPassword->email,
            ]);
        } else {
            return view('login', [
                'title' => 'User not found',
                //. $resetPassword->email,
            ]);
        }
    }

    // Xác thực đăng nhập
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
                return redirect()->route('admin.dashboard'); // Giao diện admin
            }
            // Giao diện customer
            return redirect('/'); // Giao diện khách hàng
        }

        return redirect()->back()->withErrors(['login' => 'Tài khoản hoặc mật khẩu không đúng']);
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
