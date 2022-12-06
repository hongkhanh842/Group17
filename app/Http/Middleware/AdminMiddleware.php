<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
