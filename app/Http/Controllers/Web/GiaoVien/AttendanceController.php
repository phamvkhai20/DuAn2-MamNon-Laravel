<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Kid;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function giao_dien_diem_danh(Request $request, $id)
    {
        $dateAttendance=request()->get('date')?$request->get('date'):substr(Carbon::now(), 0, 10);
        $idTeacher = Auth::guard('teacher')->user()->id;
        if ($request->ajax()) {
            $data = $request->get('data');
            $date = Carbon::now();
            $today = substr($date, 0, 10);
            $kids = Kid::where('class_id', $id)->with(['attendance' => function ($query) use ($data) {
                $query->where("date", $data);
            }])->get();
            $attendanceTrue = Attendance::where('class_id', $id)->where("date", $data)->with('kid')->where("status", 1)->get();
            return response()->json(['attendanceTrue' => $attendanceTrue, 'kids' => $kids]);
        }

        $kids = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $query->where("date",request()->get('date')?request()->get('date'):substr(Carbon::now(), 0, 10))->with('don_ho');
        }])->with('parent')->get();

        $attendanceTrue = Attendance::where('class_id', $id)->where("date", $dateAttendance)->with('don_ho','teacher')->with(['kid'=>function($query){
            $query->with('parent');
        }])->orderBy('note', 'desc')->get();
        $check = Attendance::where('class_id', $id)->where("date", $dateAttendance)->with('don_ho','teacher')->with(['kid'=>function($query){
            $query->with('parent');
        }])->where('status', '1')->get();
        return view('staff.giao-vien.diem-danh.diem-danh', compact('kids', 'attendanceTrue','idTeacher','dateAttendance','check'));
    }
    public function giao_dien_diem_danh_don_muon(Request $request, $id)
    {
        $dateAttendance=request()->get('date')?$request->get('date'):substr(Carbon::now(), 0, 10);
        $idTeacher = Auth::guard('teacher')->user()->id;
        if ($request->ajax()) {
            $data = $request->get('data');
            $date = Carbon::now();
            $today = substr($date, 0, 10);
            $kids = Kid::where('class_id', $id)->with(['attendance' => function ($query) use ($data) {
                $query->where("date", $data);
            }])->get();
            $attendanceTrue = Attendance::where('class_id', $id)->where("date", $data)->with('kid')->where("status", 1)->get();
            return response()->json(['attendanceTrue' => $attendanceTrue, 'kids' => $kids]);
        }
        
        $kids = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $query->where("date",request()->get('date')?request()->get('date'):substr(Carbon::now(), 0, 10))->with('don_ho');
        }])->get();
        $attendanceTrue = Attendance::where('class_id', $id)->where("date", $dateAttendance)->with('don_ho','teacher')->where("status", 1)->with(['kid'=>function($query){
            $query->with('parent');
        }])->where('leave_time','00:00:00')->get();
        
        return view('staff.giao-vien.diem-danh.diem-danh-don-muon', compact('kids', 'attendanceTrue','idTeacher','dateAttendance'));
    }
    public function diem_danh_den(Request $request)
    {
        $idTeacher = Auth::guard('teacher')->user()->id;
        $date= request()->get('dateAttendance');
        $data = Arr::except($request->all(), ['_token']);
        // dd($data);
        if($date>substr(Carbon::now(), 0, 10)){
            $request->session()->flash('status', 'error');
            return redirect()->route('giao-vien.giao_dien_diem_danh', ['id' => $data["class"],'date'=>$date]);
        }
        foreach ($data["kid_id"] as $index => $kid) {
            $find = Attendance::where('kid_id', $data["kid_id"][$index])->where("date", $data["date"][$index])->where('status', '1')->get();
            if ($data["status"][$index] != "2") {
                    $attendance = new Attendance();
                    $attendance->kid_id = $data["kid_id"][$index];
                    $attendance->leave_time = "00:00:00";
                    if ($data["status"][$index] == "off") {
                        $attendance->status = 0;
                        $attendance->arrival_time = "00:00:00";
                        $attendance->health =  "";
                        $attendance->learning =  "";
                        $attendance->eating =  "";
                    } else {
                        $attendance->status = 1;
                        $attendance->arrival_time =  $data["arrival_time"][$index];
                        $attendance->health = 'Trẻ bình thường! Không có dấu hiệu bất thường';
                        $attendance->learning = 'Chăm ngoan! Nghe lời cô giáo';
                        $attendance->Eating = 'Trẻ bình thường! Không quậy trong giờ ăn, ngủ';
                    }
                    $attendance->teacher_id =  Auth::guard('teacher')->user()->id;
                    $attendance->class_id =  $data["class_id"][$index];
                    $attendance->date =  $data["date"][$index];
                    $attendance->note =  $data["note"][$index];
                    
                    $attendance->save();
                    $request->session()->flash('status', 'ok');
                
            }
        }
        return redirect()->route('giao-vien.giao_dien_diem_danh', ['id' => $data["class"],'date'=>$date]);
    }
    public function diem_danh_ve(Request $request)
    {
        $date= request()->get('dateAttendance');
        // dd($date);
        $data = Arr::except($request->all(), ['_token']);
        // dd($data);
        foreach ($data["kid_id"] as $index => $kid) {
            $attendance = new Attendance();
            if($data["status"][$index] != $data["old_status"][$index]){
                if ($data["status"][$index] == "0") {
                    $attendance->status = 0;
                    $attendance->leave_time =  $data["leave_time"][$index];
                    if(json_decode($attendance->leave_time) == null){
                        if($data["leave_time"][$index] == "00:00:00"){
                        $a = Carbon::now()->toTimeString();   
                        }
                        else{
                        $a = array();
                        $a[] = $attendance->leave_time;
                        $a[] = Carbon::now()->toTimeString();   
                        }     
                    }
                    else{
                        $a = json_decode($attendance->leave_time);
                        $a[] = Carbon::now()->toTimeString();
                    }
                    
                    $params = array(
                    'leave_time' => $a,
                    'status' => $attendance->status,
                    'note' => $data["note"][$index],
                    );
                    
                    $find = Attendance::where("kid_id", $data["kid_id"][$index])->where("date", $date)->first();
                    $find->update($params);
                }
                else{
                    $attendance->status = 1;
                    $attendance->arrival_time =  $data["arrival_time"][$index];
                    if(json_decode($attendance->arrival_time) == null){
                        if($data["arrival_time"][$index] == "00:00:00"){
                            $a = Carbon::now()->toTimeString();   
                        }
                        else{
                        $a = array();
                        $a[] = $attendance->arrival_time;
                        $a[] = Carbon::now()->toTimeString();   
                        }
                    }
                    else{
                        $a = json_decode($attendance->arrival_time);
                        $a[] = Carbon::now()->toTimeString();
                    }
                    if($data["health"][$index] == ""){
                        $attendance->health = 'Trẻ bình thường! Không có dấu hiệu bất thường';
                        $attendance->learning = 'Chăm ngoan! Nghe lời cô giáo';
                        $attendance->eating = 'Trẻ bình thường! Không quậy trong giờ ăn, ngủ';
                    }
                    else{
                        $attendance->health = $data["health"][$index];
                        $attendance->learning = $data["learning"][$index];
                        $attendance->eating = $data["eating"][$index];
                    }
                    $params = array(
                        'arrival_time' => $a,
                        'status' => $attendance->status,
                        'note' => $data["note"][$index],
                        'health' => $attendance->health,
                        'learning' => $attendance->learning,
                        'eating' => $attendance->eating,
                    );
                    $find = Attendance::where("kid_id", $data["kid_id"][$index])->where("date", $date)->first();
                    $find->update($params);
                }
            }
            else{
                $params = array(
                    'note' => $data["note"][$index],
                    'health' => $data["health"][$index],
                    'learning' => $data["learning"][$index],
                    'eating' => $data["eating"][$index],
                );
                $find = Attendance::where("kid_id", $data["kid_id"][$index])->where("date", $date)->first();
                $find->update($params);
            }
        }
        $request->session()->flash('status', 'ok');
        return redirect()->route('giao-vien.giao_dien_diem_danh', ['id' => $data["class"],'date'=>$date]);
    }

    public function diem_danh_ve_muon(Request $request)
    {
        $date= request()->get('dateAttendance');
        $data = Arr::except($request->all(), ['_token']);
        foreach ($data["kid_id"] as $index => $kid) {
            $attendance = new Attendance();
            if ($data["status"][$index] == "off") {
                $attendance->leave_time = "00:00:00";
            } else {
                $attendance->leave_time =  $data["leave_time"][$index];
            }
            $attendance->note =  $data["note"][$index]?$data["note"][$index]:'null';
            $params = array(
                'note'  => $attendance->note,
                'leave_time' => $attendance->leave_time,
            );

            if ($data["check_diem_danh_ve"][$index] != "true") {
                $params = array(
                    'note'  => $attendance->note,
                    'leave_time' => $attendance->leave_time,
                );
            } else if ($data["status"][$index] == "off") {
                $params = array(
                    'leave_time' => $attendance->leave_time,
                    'note'  => $attendance->note,
                );
            } else if ($data["status"][$index] == "off" && $data["check_diem_danh_ve"][$index] != "false") {
                $params = array(
                    'leave_time' => $attendance->leave_time,
                    'note'  => $attendance->note,
                );
            } else {
                $params = array(
                    'note'  => $attendance->note,
                );
            }
            $find = Attendance::where("kid_id", $data["kid_id"][$index])->where("date", $date)->first();
            $find->update($params);
        }
        $request->session()->flash('status', 'ok');
        return redirect()->route('giao-vien.giao_dien_diem_danh_don_muon', ['id' => $data["class"],'date'=>$date]);
    }
    
    public function xem_diem_danh(Request $request,$id)
    {
        $date=request()->all()?(request()->get('date')):substr(Carbon::now(), 0, 10);
        $month = substr($date, 0, 7);
        $todayTemp = substr($date, 0, 10);
        if($todayTemp==$month){
            $today = substr($date, 0, 10)."-31";
        }else{
            $today=$todayTemp;
        }
        $getAttendance = Attendance::whereBetween("date", [$month . '-1', $today])->where('class_id', $id)->whereBetween('status', ['0', '1'])->orderBy('date', "asc")->distinct()->get(['date']);
        $studentInClass = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $date=request()->all()?(request()->get('date')):substr(Carbon::now(), 0, 10);
            $month = substr($date, 0, 7);
            $todayTemp = substr($date, 0, 10);
            if($todayTemp==$month){
                $today = substr($date, 0, 10)."-31";
            }else{
                $today=$todayTemp;
            }
            $query->whereBetween("date", [$month.'-1', $today]);
        }])->get();
        $absent = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $date=request()->all()?(request()->get('date')):substr(Carbon::now(), 0, 10);
            $month = substr($date, 0, 7);
            $todayTemp = substr($date, 0, 10);
            if($todayTemp==$month){
                $today = substr($date, 0, 10)."-31";
            }else{
                $today=$todayTemp;
            }
            $query->whereBetween("date", [$month.'-1', $today])->where('status', "0");
        }])->get();
        $permission = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $date=request()->all()?(request()->get('date')):Carbon::now();
            $month = substr($date, 0, 7);
            $todayTemp = substr($date, 0, 10);
            if($todayTemp==$month){
                $today = substr($date, 0, 10)."-31";
            }else{
                $today=$todayTemp;
            }
            $query->whereBetween("date", [$month.'-1', $today])->where('status', "2");
        }])->get();
        $present = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $date=request()->all()?(request()->get('date')):substr(Carbon::now(), 0, 10);
            $month = substr($date, 0, 7);
            $todayTemp = substr($date, 0, 10);
            if($todayTemp==$month){
                $today = substr($date, 0, 10)."-31";
            }else{
                $today=$todayTemp;
            }
            $query->whereBetween("date", [$month.'-1', $today])->where('status', "1");
        }])->get();
        $meal = Kid::where('class_id', $id)->with(['attendance' => function ($query) {
            $date=request()->all()?(request()->get('date')):substr(Carbon::now(), 0, 10);
            $month = substr($date, 0, 7);
            $todayTemp = substr($date, 0, 10);
            if($todayTemp==$month){
                $today = substr($date, 0, 10)."-31";
            }else{
                $today=$todayTemp;
            }
            $query->whereBetween("date", [$month.'-1', $today])->where('meal', "on");
        }])->get();
        return view('staff.giao-vien.diem-danh.tong-hop', compact('getAttendance', 'studentInClass', 'absent', 'permission', 'present','month','meal'));
    }
    public function confirm_attendance(Request $request){
        $arrKids=$request->get('confirm');
        $date=$request->get('dateConfirm');
        $id_teacher=$request->get('id_teacher');
        $class=$request->get('class');
        foreach($arrKids as $kid=>$status){
            $params = array(
                'teacher_2'  => $id_teacher,
                'status'=> $status=='on' ? 1 : 0,
            );

            $find = Attendance::where("kid_id", $kid)->where("date",  $date)->first();
            $find->update($params);
        }
        return redirect()->route('giao-vien.giao_dien_diem_danh', ['id' => $class]);
    }

    public function update_attendance_history(Request $request){
        $id=$request->get('id');
        $attendance=$request->get('attendance');
        if($attendance==2||$attendance==0){
            $update_attendance= Attendance::find($id)->update(['status'=>$attendance,'arrival_time'=>'00:00:00','leave_time'=>'00:00:00','meal'=>'off','note xin nghỉ']);
        }else{
            $update_attendance= Attendance::find($id)->update(['status'=>$attendance]);
        }
        return response()->json(
            ['data' =>   $update_attendance]
        );
    }
}