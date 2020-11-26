<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckTeacher
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
        if(Auth::guard('teacher')->check()==false){
            return redirect()->route('form.teacher');
        }else{
            return $next($request);
        }
    }
}
