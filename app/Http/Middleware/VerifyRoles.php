<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyRoles
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }
        return redirect()->route('member.home')->with('message', __('Some error message'));
    }
}
