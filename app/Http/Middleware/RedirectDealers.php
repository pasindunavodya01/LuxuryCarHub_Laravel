<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectDealers
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'dealer' && $request->is('dashboard')) {
            return redirect()->route('dealer.cars.index');
        }

        return $next($request);
    }
}
