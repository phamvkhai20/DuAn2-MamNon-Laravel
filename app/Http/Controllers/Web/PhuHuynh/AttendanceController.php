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
            $query->whereBetween("date", [substr(Carbon::now(), 0, 7) . '-1', substr(Carbon::now(), 0, 10)])->orderByDesc('date');
        }])->first();
        return view('staff.phu-huynh.diem-danh.index', ['kid' => $kid, 'id' => $id]);
    }
    public function absence_history($id)
    {
        $history = Kid::where('id', $id)->with(['attendance' => function ($query) {
            $query->whereBetween("date", [substr(Carbon::now(), 0, 7) . '-1', substr(Carbon::now(), 0, 10)])->whereIn('status', ['0', '2'])->orderBy('date', 'desc');
        }])->first();
        $future = Kid::where('id', $id)->with(['attendance' => function ($query) {
            $query->whereBetween("date", [substr(Carbon::now()->add('1', 'day'), 0, 10), substr(Carbon::now(), 0, 7) . '-31'])->whereIn('status', ['0', '2'])->orderBy('date', 'asc');
        }])->first();
        return view('staff.phu-huynh.diem-danh.lich-su-nghi', ['history' => $history, 'future' => $future, 'id' => $id]);
    }
}