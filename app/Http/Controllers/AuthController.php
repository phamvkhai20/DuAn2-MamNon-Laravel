<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Auth;
use Arr;
use App\Models\User;
use App\Models\Student;

class AuthController extends Controller

{
   protected function form_login_school()
   {
      return view('web.login.school');
   }
   public function nop_ho_so_nhap_hoc()
   {
      return view('web.page.nop-ho-so');
   }
   public function login(LoginRequest $request)
   {
      $data = Arr::except($request->all(), ['_token']);
      if ($result = Auth::attempt($data)) {
         if (Auth::user()->status == 0) {
            return redirect()->route('form.school')->with('thongbao', 'Tài Khoản Của Bạn Đã Bị Khóa');
         } else {
            return redirect()->route('nha-truong.index');
         }
      } else {
         return redirect()->back()->with('thongbao', 'Bạn nhập sai số điện thoại hoặc mật khẩu');
      }
   }

   public function logout()
   {
      Auth::logout();
      return redirect()->route('form.school');
   }

   protected function form_login_parent()
   {
      return view('web.login.parents');
   }
   protected function form_login_teacher()
   {
      return view('web.login.teacher');
   }
   protected function home()
   {
      return view('web.index');
   }
}