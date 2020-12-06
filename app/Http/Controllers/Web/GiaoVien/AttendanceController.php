<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Kid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AttendanceController extends Controller
{
    public function giao_dien_diem_danh(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = $request->get('data');
            $date = Carbon::now('Asia/Ho_Chi_Minh');
            $today = substr($date, 0, 10);
            $kids = Kid::where('class_id', $id)->with(['attendance' => function ($query) use ($data) {
                $query->where("date", $data);
            }])->get();
            $attendanceTrue = Attendance::where('class_id', $id)->where("date", $data)->with('kid')->where("status", 1)->get();
            return response()->json(['attendanceTrue' => $attendanceTrue, 'kids' => $kids]);
        }
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $today = substr($date, 0, 10);
        $kids = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $query->where("date", substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10));
        }])->get();
        $attendanceTrue = Attendance::where('class_id', $id)->where("date", $today)->with('kid')->where("status", 1)->get();
        return view('staff.giao-vien.diem-danh.diem-danh', compact('kids', 'attendanceTrue'));
    }

    public function diem_danh_den(Request $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        // dd($data);
        foreach ($data["kid_id"] as $index => $kid) {
            $find = Attendance::where('kid_id', $data["kid_id"][$index])->where("date", $data["date"][$index])->get();
            if ($data["status"][$index] != "2") {
                if (count($find) < 1) {
                    $attendance = new Attendance();
                    $attendance->kid_id = $data["kid_id"][$index];
                    $attendance->leave_time = "00:00:00";
                    if ($data["status"][$index] == "off") {
                        $attendance->meal = 0;
                    } else {
                        $attendance->meal = $data["meal"][$index];
                    }
                    if ($data["status"][$index] == "off") {
                        $attendance->status = 0;
                        $attendance->arrival_time = "00:00:00";
                    } else {
                        $attendance->status = 1;
                        $attendance->arrival_time =  $data["arrival_time"][$index];
                    }
                    $attendance->class_id =  $data["class_id"][$index];
                    $attendance->date =  $data["date"][$index];
                    $attendance->note =  $data["note"][$index];
                    $attendance->save();
                } else {
                    $attendance = new Attendance();
                    if ($data["status"][$index] == "off") {
                        $attendance->meal = 0;
                    } else {
                        $attendance->meal = $data["meal"][$index];
                    }
                    if ($data["status"][$index] == "off") {
                        $attendance->status = 0;
                        $attendance->arrival_time = "00:00:00";
                    } else {
                        $attendance->status = 1;
                        $attendance->arrival_time =  $data["arrival_time"][$index];
                    }
                    $attendance->class_id =  $data["class_id"][$index];
                    $attendance->note =  $data["note"][$index];
                    if ($data["arrival_time"][$index] !== "00:00:00") {
                        $params = array(
                            'note'  => $attendance->note,
                            'status'  => $attendance->status,
                            'leave_time' => "00:00:00",
                            'arrival_time' => $attendance->arrival_time,
                            'meal' => $attendance->meal
                        );
                    } else {
                        $params = array(
                            'note'  => $attendance->note,
                            'status'  => $attendance->status,
                            'meal' => $attendance->meal
                        );
                    }
                    $find = Attendance::where("kid_id", $data["kid_id"][$index])->where("date", $data["date"][$index])->first();
                    $find->update($params);
                }
            }
        }
        return redirect()->route('giao-vien.giao_dien_diem_danh', ['id' => $data["class"]]);
    }
    public function diem_danh_ve(Request $request)
    {
        dd($request->all());
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $month = substr($date, 0, 7);
        $today = substr($date, 0, 10);
        $data = Arr::except($request->all(), ['_token']);
        foreach ($data["kid_id"] as $index => $kid) {
            $attendance = new Attendance();
            if ($data["status"][$index] == "off") {
                $attendance->leave_time = "00:00:00";
            } else {
                $attendance->leave_time =  $data["leave_time"][$index];
            }
            $attendance->note =  $data["note"][$index];
            $params = array(
                'note'  => $attendance->note,
                'leave_time' => $attendance->leave_time,
            );

            if ($data["check_diem_danh_ve"][$index] !== "true") {
                $params = array(
                    'note'  => $attendance->note,
                    'leave_time' => $attendance->leave_time,
                );
            } else if ($data["status"][$index] == "off") {
                $params = array(
                    'leave_time' => $attendance->leave_time,
                    'note'  => $attendance->note,
                );
            } else if ($data["status"][$index] == "off" && $data["check_diem_danh_ve"][$index] !== "false") {
                $params = array(
                    'leave_time' => $attendance->leave_time,
                    'note'  => $attendance->note,
                );
            } else {
                $params = array(
                    'note'  => $attendance->note,
                );
            }
            $find = Attendance::where("kid_id", $data["kid_id"][$index])->where("date", $data["date"][$index])->first();
            $find->update($params);
        }
        return redirect()->route('giao-vien.giao_dien_diem_danh', ['id' => $data["class"]]);
    }
    public function xem_diem_danh($id)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $month = substr($date, 0, 7);
        $today = substr($date, 0, 10);
        $getAttendance = Attendance::whereBetween("date", [$month . '-1', $today])->where('class_id', $id)->orderBy('date', "asc")->distinct()->get(['date']);
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
        return view('staff.giao-vien.diem-danh.tong-hop', compact('getAttendance', 'studentInClass', 'absent', 'permission', 'present'));
    }
}