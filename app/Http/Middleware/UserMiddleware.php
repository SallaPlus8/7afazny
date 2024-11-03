<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Useriddleware {
    public function handle($request, Closure $next) {
        if (!Auth::guard('user')->check()) {
            return redirect('../../../resources/views/auth/user/login.blade.php');
        }
        return $next($request);
    }
}

