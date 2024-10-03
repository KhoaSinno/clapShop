<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có vai trò phù hợp hay không
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Nếu không đủ quyền, có thể redirect về trang khác hoặc trả về lỗi 403
        return redirect('/')->with('error', 'You do not have access to this area.');
    }
}
