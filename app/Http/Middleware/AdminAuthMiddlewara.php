<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddlewara
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    //auth()->user()->is_admin != 1

        if (!auth()->check() || !auth()->user()->can('Admin-admin-index')){

            return redirect()->route('home');
        }
        return $next($request);
    }
}
