<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Kid;
use Carbon\Carbon;
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
        $today = Carbon::now()->format('d-m-Y');
        if ($start < $today) {
            return response()->json(['error' => 'Ngày Nghỉ không hợp lệ !'], 409);
        }
        if ($end === $start) {
            $scheduled_day = Carbon::parse($start)->format('Y-m-d');
            $days = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ
            Bảy'];
            $day = date('w', strtotime($scheduled_day));
            if ($day == 7 || $day == 6) {
                return response()->json(['error' => 'Ngày nghỉ không hợp lệ'], 409);
            }
            $checkAttendance = Attendance::where('kid_id', $request->get('id'))->where('date', Carbon::parse($start)->format('Y-m-d'))->get();
            if (count($checkAttendance) < 1) {
                $kid = Kid::find($request->get('id'));
                $offSchool = new Attendance();
                $offSchool->kid_id = $request->get('id');
                $offSchool->leave_time = "00:00:00";
                $offSchool->status = 2;
                $offSchool->arrival_time = "00:00:00";
                $offSchool->class_id = $kid->class_id;
                $offSchool->date =  Carbon::parse($start)->format('Y-m-d');
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
            $countSuccess = 0;
            foreach ($outArray as $key => $day) {
                $checkAttendance = Attendance::where('kid_id', $request->get('id'))->where('date',  $day)->get();
                if (count($checkAttendance) < 1) {
                    $countSuccess += 1;
                    $offSchool = new Attendance();
                    $offSchool->kid_id = $request->get('id');
                    $offSchool->leave_time = "00:00:00";
                    $offSchool->status = 2;
                    $offSchool->arrival_time = "00:00:00";
                    $offSchool->class_id = $kid->class_id;
                    $offSchool->date = $day;
                    $offSchool->note =  "";
                    $offSchool->save();
                }
            }
            if ($countSuccess == 0) {
                return response()->json(['error' => 'Ngày nghỉ đã tồn tại'], 409);
            } else {
                return response()->json(
                    ['data' =>   'Thành công']
                );
            }
        }
    }
}