<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfSessionExist
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
        if (session('user_hashed_id')) {
            return redirect()->route('accounts.index', [session('user_hashed_id')]);
        }

        return $next($request);

    }
}
