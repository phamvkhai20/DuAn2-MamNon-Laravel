<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Kid;
use App\Models\School;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassRequest;

class HomeController extends Controller
{
    protected function index()
    {
     
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $today = substr($date, 0, 10);
        $attendance=Kid::with(['attendance'=>function($query){
            $query->whereBetween("date", [substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 7) . '-1', substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10)])
            ->where('status', "0");
        }])->withCount('attendance')
        ->has('attendance', '>', 1)->get();
     
        $attendanceToday=Attendance::where("date", substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10))->whereIn('status', ["0",'2'])->get();
        $meal=Attendance::where("date", substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10))->where('meal', "on")->get();
       return view('staff.nha-truong.dashboard.index',['attendance'=>$attendance,'attendanceToday'=>$attendanceToday,'meal'=>$meal]);
    }
    function change_password($id){
        $data['school'] = School::find(Auth::user()->id);
        return view('staff.nha-truong.doi-mat-khau.changepassword',$data);
    }
    function save_password(ChangePassRequest $request){
        $hashedPassword = Auth::user()->password;
 
       if (\Hash::check($request->oldpass , $hashedPassword )) {
 
         if (!\Hash::check($request->password , $hashedPassword)) {
 
              $school =School::find(Auth::user()->id);
              $school->password = bcrypt($request->password);
              School::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $school->password));

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

    public function chartAttendance()
    {
        $arrayDate=[];
        $arrayMeal=[];
        $dates=[9,8,7,6,5,4,3,2,1,0];
        foreach($dates as $key=>$dateForeach){
            $attendanceToday=Attendance::where("date", substr(Carbon::now()->add(-$dateForeach,'day'), 0, 10))->whereIn('status', ["0",'2'])->count();
            $meal=Attendance::where("date", substr(Carbon::now()->add(-$dateForeach,'day'), 0, 10))->where('meal', "on")->count();
            array_push($arrayDate, $attendanceToday);
            array_push($arrayMeal,$meal);
        }

        return response()->json(['arrayDate' =>$arrayDate,'arrayMeal'=>$arrayMeal]);
    }


}
