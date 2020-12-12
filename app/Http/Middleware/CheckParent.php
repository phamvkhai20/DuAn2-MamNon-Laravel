<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckParent
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
        if (Auth::guard('parent')->check() == false) {
            return redirect()->route('form.parent');
        } else {
            return $next($request);
        }
    }
}
