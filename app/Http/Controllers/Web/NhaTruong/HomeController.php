<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\ClassModel;
use App\Models\Date;
use App\Models\Kids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function index()
    {
        $date=Carbon::now('Asia/Ho_Chi_Minh');
        $month=substr($date,0,7);
        $today=substr($date,0,10);
        $getAttendance=Attendace::whereBetween("date",[$month.'-1',$today])->orderBy('date',"asc")->distinct()->get();
        dd($getAttendance);
        $studentInClass=Kids::where('class_id','7')->with(['attendance' => function ($query) {
            $query->where('class_id', '7')->whereBetween("date",[substr(Carbon::now('Asia/Ho_Chi_Minh'),0,7).'-1',substr(Carbon::now('Asia/Ho_Chi_Minh'),0,10)]);
        }])->get();
        return view('staff.dashboard.index',compact('getAttendance','studentInClass'));
    }
}
