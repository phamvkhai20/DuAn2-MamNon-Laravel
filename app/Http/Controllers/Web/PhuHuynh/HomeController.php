<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Kid;
use App\Models\Parents;
use Carbon\Carbon;
use Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassRequest;
class HomeController extends Controller
{
    protected function index()
    {   $today=substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10);
        $scheduled_day = Carbon::parse($today)->format('Y-m-d');
        $days = ['Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy'];
        $day = date('w', strtotime($scheduled_day));
        $ngayThu=1;
        if ($day == 7 || $day == 6) {
            $ngayThu=0;
        }
        $prinDay= $days[$day].', Ngày '.Carbon::parse($today)->format('d-m-Y');
        $infoKid = Kid::find(session('id_kid_default'));
        $attendance= Attendance::where('kid_id',$infoKid->id)->where('date',substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10))->first();
        $teachers = Assignment::where('class_id',   $infoKid->class_id)->with('teacher')->get();
        return view('staff.phu-huynh.dashboard.index', ['teachers' => $teachers,'attendance'=> $attendance,'ngayThu'=> $ngayThu,'prinDay'=>$prinDay]);
    }
    protected function set_default_kid(Request $request)
    {
        session(['id_kid_default' => $request->get('id')]);
        return redirect()->route('phu-huynh.index', ['id' => $request->get('id')]);
    }

    function change_password($id){
        $data['parent'] = Parents::find(Auth::guard('parent')->user()->id);
        return view('staff.phu-huynh.doi-mat-khau.changepassword',$data);
    }
    function save_password(ChangePassRequest $request){
        $hashedPassword = Auth::guard('parent')->user()->password;
 
       if (\Hash::check($request->oldpass , $hashedPassword )) {
 
         if (!\Hash::check($request->password , $hashedPassword)) {
 
              $parent =Parents::find(Auth::guard('parent')->user()->id);
              $parent->password = bcrypt($request->password);
              Parents::where( 'id' , Auth::guard('parent')->user()->id)->update( array( 'password' =>  $parent->password));

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
