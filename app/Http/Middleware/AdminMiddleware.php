<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!isAdmin() && !isManager() && !isShipper()) {
            return redirect()->back()->with('error', 'Bạn không đủ quyền để thực hiện hành động này');
        }
        return $next($request);
    }
}
