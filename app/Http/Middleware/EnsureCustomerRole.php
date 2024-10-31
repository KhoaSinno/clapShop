<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCustomerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Kiểm tra xem người dùng có vai trò là "customer" không
            if (Auth::user()->role !== 'customer') {
                // Nếu người dùng không phải là "customer", thực hiện đăng xuất
                Auth::logout();
                // Chuyển hướng về trang đăng nhập với thông báo
                return redirect()->route('login')->with('error', 'Bạn phải đăng nhập bằng tài khoản khách hàng để thanh toán.');
            }
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn phải đăng nhập để tiếp tục.');
        }

        // Nếu là "customer", cho phép tiếp tục truy cập
        return $next($request);
    }
}
