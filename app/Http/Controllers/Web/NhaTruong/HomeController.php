<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Kid;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
