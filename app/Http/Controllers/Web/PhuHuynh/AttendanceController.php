<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Kid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function view_attendance($id)
    {

        $kid = Kid::where('id', $id)->with(['attendance' => function ($query) {
            $query->whereBetween("date", [substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 7) . '-1', substr(Carbon::now('Asia/Ho_Chi_Minh'), 0, 10)]);
        }])->first();
        return view('staff.phu-huynh.diem-danh.index', ['kid' => $kid, 'id' => $id]);
    }
}