<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

use Auth;
use Arr;
use App\Models\{Parents, School, Teacher};

class AuthController extends Controller

{
   protected function home()
   {
      return view('web.index');
   }

   // Đăng nhập nhà trường
   protected function form_login_school()
   {
      return view('web.login.school');
   }
   
   public function loginSchool(LoginRequest $request)
   {
      $data = Arr::except($request->all(), ['_token']);

      if ($result = Auth::attempt($data)) {
         if (Auth::user()->status == 0) {
            return redirect()->route('form.school')->with('thongbao', 'Tài Khoản Của Bạn Đã Bị Khóa');
         } else {
            return redirect()->route('nha-truong.nha-truong.index');
         }
      } else {
         return redirect()->back()->with('thongbao', 'Bạn nhập sai số điện thoại hoặc mật khẩu');
      }
   }
   // Đăng nhập giáo viên
   protected function form_login_teacher()
   {
      return view('web.login.teacher');
   }
   public function loginTeacher(LoginRequest $request)
   {
      $data = Arr::except($request->all(), ['_token']);
      if ($result = Auth::guard('teacher')->attempt($data)) {
         $idTeacher = Auth::guard('teacher')->user()->id;
         if (Auth::guard('teacher')->user()->status == 0) {
            return redirect()->route('form.teacher')->with('thongbao', 'Tài Khoản Của Bạn Đã Bị Khóa');
         } else {
            $findTeacher = Teacher::where('id', $idTeacher)->with(['assignment' => function ($query) {
               $query->with('class');
            }])->first();
            if (count($findTeacher->assignment)>0) {
               session(['classArray' => $findTeacher->assignment]);
               session(['class' => $findTeacher->assignment[0]->class_id]);
               return redirect()->route('giao-vien.index');
            }
            return redirect()->route('giao-vien.index');
         }
      } else {
         return redirect()->back()->with('thongbao', 'Bạn nhập sai số điện thoại hoặc mật khẩu');
      }
   }
   // Đăng nhập phụ huynh
   protected function form_login_parent()
   {
      return view('web.login.parents');
   }
   public function loginParent(LoginRequest $request)
   {
      $data = Arr::except($request->all(), ['_token']);
      if ($result = Auth::guard('parent')->attempt($data)) {
         if (Auth::guard('parent')->user()->parent_status == 0) {
            return redirect()->route('form.parent')->with('thongbao', 'Tài Khoản Của Bạn Đã Bị Khóa');
         } else {
            $idParent = Auth::guard('parent')->user()->id;
            $findInfoParent = Parents::where('id', $idParent)->with('kids')->first();
            $coutKids = count($findInfoParent->kids);
          if ($coutKids > 0) {
               session(['kids' => $findInfoParent->kids]);
               session(['id_kid_default' => $findInfoParent->kids[0]->id]);
               return redirect()->route('phu-huynh.index', ['id' => $findInfoParent->kids[0]->id]);
            } else {
               return redirect()->route('form.parent')->with('thongbao', 'Tài Khoản Của Bạn Đã Bị Khóa');
            }
         }
      } else {
         return redirect()->back()->with('thongbao', 'Bạn nhập sai số điện thoại hoặc mật khẩu');
      }
   }
   public function nop_ho_so_nhap_hoc()
   {
      return view('web.page.nop-ho-so');
   }
   // Đăng xuất
   public function logoutSchool(Request $request)
   {
      Auth::logout();
      $request->session()->flush();
      return redirect()->route('web.home');
   }
   public function logoutTeacher(Request $request)
   {
      Auth::guard('teacher')->logout();
      $request->session()->flush();
      return redirect()->route('web.home');
   }
   public function logoutParent(Request $request)
   {
      Auth::guard('parent')->logout();
      $request->session()->flush();
      return redirect()->route('web.home');
   }
}