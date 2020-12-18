<?php

namespace App\Http\Middleware;

use App\Models\Parents;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        // dd(Auth::guard('parent')->check());
        if (Auth::check() === true || Auth::guard('parent')->check()==true || Auth::guard('teacher')->check()==true) {
            if (!empty(Auth::guard('teacher')->user()) == true) {
                return redirect()->route('giao-vien.index');
            } else  if (!empty(Auth::guard('parent')->user()) == true) {
                $idParent = Auth::guard('parent')->user()->id;

                $findInfoParent = Parents::where('id', $idParent)->with('kids')->first();
                $coutKids = count($findInfoParent->kids);
                if ($coutKids > 0) {
                    session(['kids' => $findInfoParent->kids]);
                    session(['id_kid_default' => $findInfoParent->kids[0]->id]);
                    return redirect()->route('phu-huynh.index', ['id' => $findInfoParent->kids[0]->id]);
                }
                if ($coutKids == 0) {
                    Auth::guard('parent')->logout();
                    return redirect()->route('form.parent')->with('thongbao', 'Tài Khoản Của Bạn Đã Bị Khóa');
                }
            } else  if (!empty(Auth::user()) == true) {
                return redirect()->route('nha-truong.nha-truong.index');
            };
        } else {
            if(Auth::check() === true){
                Auth::user()->logout();
            }
            if( Auth::guard('parent') === true){
                Auth::guard('parent')->logout();
            }
            if(Auth::guard('teacher')->check() === true){
                Auth::guard('teacher')->logout();
            }
            return $next($request);
        }
    }
}
