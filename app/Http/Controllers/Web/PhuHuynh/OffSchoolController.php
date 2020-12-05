<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Kid;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class OffSchoolController extends Controller
{
    protected function xin_nghi_hoc()
    {
        return view('staff.phu-huynh.xin-nghi-hoc.xin-nghi-hoc');
    }
    protected function them_don_xin_nghi(Request $request)
    {
        $data = $request->get('date');
        $start = substr($data, 0, 10);
        $end = substr($data, 13, 10);
        if (empty($data)) {
            return response()->json(['error' => 'Vui lòng chọn ngày nghỉ'], 400);
        }
        if ($end === $start) {
            $checkAttendance = Attendance::where('kid_id', $request->get('id'))->where('date', $request->get('start'))->get();
            if (empty($checkAttendance)) {
                $kid = Kid::find($request->get('id'));
                $offSchool = new Attendance();
                $offSchool->kid_id = $request->get('id');
                $offSchool->leave_time = "00:00:00";
                $offSchool->meal = 0;
                $offSchool->status = 2;
                $offSchool->arrival_time = "00:00:00";
                $offSchool->class_id = $kid->class_id;
                $offSchool->date =  $request->get('start');
                $offSchool->note =  "Xin Nghỉ học";
                $offSchool->save();
                return response()->json(
                    ['data' =>   'Thành công']
                );
            } else {
                return response()->json(['error' => 'Ngày nghỉ đã tồn tại'], 409);
            }
        } else if ($end < $start) {
            return response('Đã tồn tại', 402)->json(
                ['data' =>   'Ngày nghỉ không hợp lệ']
            );
        } else {
            $tmpDate = new DateTime($start);
            $tmpEndDate = new DateTime($end);
            $outArray = array();
            $kid = Kid::find($request->get('id'));
            do {
                $outArray[] = $tmpDate->format('Y-m-d');
            } while ($tmpDate->modify('+1 day') <= $tmpEndDate);
            foreach ($outArray as $key => $day) {
                $checkAttendance = Attendance::where('kid_id', $request->get('id'))->where('date',  $day)->get();
                if (count($checkAttendance) < 1) {
                    $offSchool = new Attendance();
                    $offSchool->kid_id = $request->get('id');
                    $offSchool->leave_time = "00:00:00";
                    $offSchool->meal = 0;
                    $offSchool->status = 2;
                    $offSchool->arrival_time = "00:00:00";
                    $offSchool->class_id = $kid->class_id;
                    $offSchool->date = $day;
                    $offSchool->note =  "Xin Nghỉ học";
                    $offSchool->save();
                }
            }
            return response()->json(
                ['data' =>   'Thành công']
            );
        }

        // return redirect()->route('phu-huynh.xin-nghi-hoc', ['id' => session('id_kid_default')]);
    }
}