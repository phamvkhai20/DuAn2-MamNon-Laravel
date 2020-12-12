<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Kid;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function index()
    {   $today=substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10);
        $scheduled_day = Carbon::parse($today)->format('Y-m-d');
        $day = date('w', strtotime($scheduled_day));
        $ngayThu=1;
        if ($day == 7 || $day == 6) {
            $ngayThu=0;
        }
        $infoKid = Kid::find(session('id_kid_default'));
        $attendance= Attendance::where('kid_id',$infoKid->id)->where('date',substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10))->first();
        $teachers = Assignment::where('class_id',   $infoKid->class_id)->with('teacher')->get();
        return view('staff.phu-huynh.dashboard.index', ['teachers' => $teachers,'attendance'=> $attendance,'ngayThu'=> $ngayThu]);
    }
    protected function set_default_kid(Request $request)
    {
        session(['id_kid_default' => $request->get('id')]);
        return redirect()->route('phu-huynh.index', ['id' => $request->get('id')]);
    }
}