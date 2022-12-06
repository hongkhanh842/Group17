<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShipperMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!isShipper() || !isAdmin()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
