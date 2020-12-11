<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $teachers = Assignment::where('class_id', session('class'))->with('teacher')->get();
        $attendance= Attendance::where('class_id',session('class'))->where('date',substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10))->get();
       return view('staff.giao-vien.dashboard.index',['attendance'=>$attendance,'ngayThu'=>$ngayThu,'teachers'=>$teachers]);
    }
 
}
