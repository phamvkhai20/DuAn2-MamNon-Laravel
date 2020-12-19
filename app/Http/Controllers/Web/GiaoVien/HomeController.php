<?php

namespace App\Http\Controllers\Web\GiaoVien;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Kid;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassRequest;
class HomeController extends Controller
{
    protected function index()
    {
        $today=substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10);
        $scheduled_day = Carbon::parse($today)->format('Y-m-d');
        $day = date('w', strtotime($scheduled_day));
        $ngayThu=1;
        if ($day == 7 || $day == 6) {
            $ngayThu=0;
        }
        $classes = Classes::where('id', session('class'))->with(['kids'=>function($query){
            $query->with('parent');
        }])->first();
        $teachers = Assignment::where('class_id', session('class'))->with('teacher')->get();
        $attendance= Attendance::where('class_id',session('class'))->where('date',substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10))->get();
       return view('staff.giao-vien.dashboard.index',['attendance'=>$attendance,'ngayThu'=>$ngayThu,'teachers'=>$teachers,'classes'=>$classes]);
    }
    protected function infoKid($id)
    {
        $infoKid = Kid::where('id',$id)->with('getClass')->first();
        return view('staff.giao-vien.thong-tin-tre.index', ['infoKid' => $infoKid]);
    }
    function change_password($id){
        $data['teacher'] = Teacher::find(Auth::guard('teacher')->user()->id);
        return view('staff.giao-vien.doi-mat-khau.changepassword',$data);
    }
    function save_password(ChangePassRequest $request){
        $hashedPassword = Auth::guard('teacher')->user()->password;
 
       if (\Hash::check($request->oldpass , $hashedPassword )) {
 
         if (!\Hash::check($request->password , $hashedPassword)) {
 
              $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
              $teacher->password = bcrypt($request->password);
              Teacher::where( 'id' , Auth::guard('teacher')->user()->id)->update( array( 'password' =>  $teacher->password));

              session()->flash('message','Đã đổi mật khẩu thành công!');
              return redirect()->back();
            }
 
            else{
                  session()->flash('error','Mật khẩu mới không được giống mật khẩu cũ!');
                  return redirect()->back();
                }
           }
 
          else{
               session()->flash('error','Kiểm tra lại mật khẩu cũ');
               return redirect()->back();
             }
        } 
}
