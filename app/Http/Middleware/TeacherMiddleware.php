<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware {
    public function handle($request, Closure $next) {
        if (!Auth::guard('teacher')->check()) {
            return redirect('../../../resources/views/auth/teacher/login.blade.php');
        }
        return $next($request);
    }
}
