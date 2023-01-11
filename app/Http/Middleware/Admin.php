<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (\Auth::user()->admin == 1) {
                return redirect()->route('admin.index');
            } else {
                return $next($request);
            }
        }else{
                return redirect()->route('login');
            }
        }
    }
