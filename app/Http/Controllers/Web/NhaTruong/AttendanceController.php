<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Kid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function list_class()
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $today = substr($date, 0, 10);
        $classes = Classes::with(['attendance' => function ($query) {
            $query->with('kid', 'teacher')->where('date', substr(Carbon::now(), 0, 10))->where('status', '1');
        }])->with(['assignments' => function ($query) {
            $query->with('teacher');
        }])->with('kids')->withCount('kids')
            ->has('kids', '>', 0)->get();
        return view('staff.nha-truong.quan-ly-diem-danh.danh-sach-lop', compact('classes'));
    }
    public function xem_diem_danh($id)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $month = substr($date, 0, 7);
        $today = substr($date, 0, 10);
        $getAttendance = Attendance::whereBetween("date", [$month . '-1', $today])->where('class_id', $id)->whereBetween('status', ['0', '1'])->orderBy('date', "asc")->distinct()->get(['date']);
        $studentInClass = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $query->whereBetween("date", [substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 7) . '-1', substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10)]);
        }])->get();
        $absent = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $query->whereBetween("date", [substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 7) . '-1', substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10)])->where('status', "0");
        }])->get();
        $permission = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $query->whereBetween("date", [substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 7) . '-1', substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10)])->where('status', "2");
        }])->get();
        $present = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $query->whereBetween("date", [substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 7) . '-1', substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10)])->where('status', "1");
        }])->get();
        return view('staff.nha-truong.quan-ly-diem-danh.diem-danh-chi-tiet', compact('getAttendance', 'studentInClass', 'absent', 'permission', 'present'));
    }
}
