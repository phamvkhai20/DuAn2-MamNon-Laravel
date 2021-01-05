<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Config;
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
        ->has('attendance', '>', 10)->get();
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

    public function configEmail(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request,
                [
                    'mail_send' => 'required',
                    'mail_title' => 'required',
                    'mail_smtp_server' => 'required',
                    'mail_encoding' => 'required',
                    'mail_smtp_port' => 'required',
                    'mail_smtp_username' => 'required',
                    'mail_smtp_pass' => 'required',
                ],
                [
                    'mail_send.required' => 'Email send không được để trống',
                    'mail_title.required' => 'Tiêu đề email không được để trống',
                    'mail_smtp_server.required' => 'Serve mail không được để trống',
                    'mail_encoding.required' => 'Loại mã hoá không được để trống',
                    'mail_smtp_port.required' => 'Cổng SMTP không được để trống',
                    'mail_smtp_username.required' => 'Tài khoản SMTP không được để trống',
                    'mail_smtp_pass.required' => 'Mật khẩu SMTP không được để trống',
                ]
            );
            Config::where('meta_key', 'mail_send')->update(['meta_value' => $request->mail_send]);
            Config::where('meta_key', 'mail_title')->update(['meta_value' => $request->mail_title]);
            Config::where('meta_key', 'mail_smtp_server')->update(['meta_value' => $request->mail_smtp_server]);
            Config::where('meta_key', 'mail_encoding')->update(['meta_value' => $request->mail_encoding]);
            Config::where('meta_key', 'mail_smtp_port')->update(['meta_value' => $request->mail_smtp_port]);
            Config::where('meta_key', 'mail_smtp_username')->update(['meta_value' => $request->mail_smtp_username]);
            Config::where('meta_key', 'mail_smtp_pass')->update(['meta_value' => $request->mail_smtp_pass]);

            return redirect(route('nha-truong.nha-truong.cau-hinh-email'))->with("success", "Thay đổi thành công");
        } else {
            return view('staff.nha-truong.config-email.config');
        }
    }

    public function templateEmail(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request,
                [
                    'template_email_nhop_ho_so' => 'required',
                    'title_nhap_ho_so' => 'required',
                ],
                [
                    'template_email_nhop_ho_so.required' => 'Vui lòng nhập tempalate email nộp hồ sơ',
                    'title_nhap_ho_so.required' => 'Vui lòng nhập tiêu đề email nộp hồ sơ',
                ]
            );

            Config::where('meta_key', 'template_email_nhop_ho_so')->update(['meta_value' => $request->template_email_nhop_ho_so]);
            Config::where('meta_key', 'title_nhap_ho_so')->update(['meta_value' => $request->title_nhap_ho_so]);
            return redirect(route('nha-truong.tempalte_email'))->with("success", "Thay đổi thành công");

        } else {
            return view('staff.nha-truong.config-email.templateEmail');
        }
    }


}
