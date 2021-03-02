<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('type') === 'admin') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login')->with('message', 'Ban khong co quyen truy cap, moi dang nhap bang tai khoan admin');
        }

    }
}
