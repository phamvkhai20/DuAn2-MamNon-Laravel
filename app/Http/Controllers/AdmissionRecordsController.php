<?php

namespace App\Http\Controllers;

use App\Models\AdmissionRecords;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdmissionRecordsController extends Controller
{
    public function them_moi(Request $request)
    {
        $data = $request->all();
        $AdmissionRecords = AdmissionRecords::create($data);
        // $date = Carbon::now('Asia/Ho_Chi_Minh');
        // $today = substr($date, 0, 10);
        // $kids = Kid::where('class_id', $id)->with(['attendance' => function ($query) use ($data) {
        //     $query->where("date", $data);
        // }])->get();
        // $attendanceTrue = Attendance::where('class_id', $id)->where("date", $data)->with('kid')->where("status", 1)->get();
        return response()->json(
            ['data' =>   $AdmissionRecords]
        );
        // $data = Arr::except($request->all(), ['_token']);

    }
}