<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use App\Models\Kid;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function giao_dien_diem_danh()
    {
        $kids = Kid::where('class_id', 1)->get();
        return view('staff.giao-vien.diem-danh.diem-danh', compact('kids'));
    }
}