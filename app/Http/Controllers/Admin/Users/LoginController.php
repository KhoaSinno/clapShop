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
    public function forget(Request $request){

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
    public function checkOTP(Request $request){
        $otp = $request->input("otp"); //otp trong email của người dùng
        $resetPassword = Password_Reset::where('token', $otp)->first();       
        
        return view('resetpassword', [
            'title' => 'Đặt lại mật khẩu'.$resetPassword->email ,
            'email' => $resetPassword->email,
        ]);
    }
    public function changePassword(Request $request){

        $email = $request->input("email"); // email của người dùng
        $password = $request->input("password"); // password mới của người dùng ()

                //Đổi mật khẩu
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->password = bcrypt($password);
                $user->save();                
                return view('login', [
                    'title' => 'Đăng nhập' ,
                    //. $resetPassword->email,
                ]);
            } else {
                return view('login', [
                    'title' => 'User not found' ,
                    //. $resetPassword->email,
                ]);
            }




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
