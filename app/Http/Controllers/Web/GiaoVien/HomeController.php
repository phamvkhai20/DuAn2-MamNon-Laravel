<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\ChildReceiptHistory;
use App\Models\Classes;
use App\Models\Kid;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    protected function index()
    {
        $childReceiptsIsConfirm = ChildReceiptHistory::where('class_id', session('class'))->where('confirm',0)->with('kid')->get();

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
       return view('staff.giao-vien.dashboard.index',['attendance'=>$attendance,'ngayThu'=>$ngayThu,'teachers'=>$teachers,'classes'=>$classes,'childReceiptsIsConfirm'=>$childReceiptsIsConfirm]);
    }

    protected function infoKid($id)
    {
        $infoKid = Kid::where('id',$id)->with('getClass')->first();
        return view('staff.giao-vien.thong-tin-tre.index', ['infoKid' => $infoKid]);
    }
    protected function list_kid($id)
    {
        $classes = Classes::where('id',$id)->with(['kids'=>function($query){
            $query->with('parent');
        }])->first();
        return view('staff.giao-vien.thong-tin-tre.danh-sach', ['classes' => $classes]);
    }
    
}
