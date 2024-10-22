<?php

namespace App\Http\Middleware;

use Closure;

class IsSubscribe
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
        if (auth()->check() && auth()->user()->subscribed == 1) {
            return $next($request);
        }
        return redirect()->route('pay');
    }
}
