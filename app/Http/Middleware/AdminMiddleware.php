<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {
    public function handle($request, Closure $next) {
        if (!Auth::guard('admin')->check()) {
            return redirect('../../../resources/views/auth/admin/login.blade.php');
        }
        return $next($request);
    }
}