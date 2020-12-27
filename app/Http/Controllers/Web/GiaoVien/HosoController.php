<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HosoController extends Controller
{
    public function index()
    {
        // $data['teachers'] = Teacher::paginate(10);
       return view('staff.giao-vien.ho-so-ca-nhan.index');
    }
    // public function get_all_teacher(Request $request)
    // {
    //    $data = $request->get('school_year');
    //    $assignment = Assignment::where('school_year_id', $data)->get();
    //    $arrayTemp = array();
    //    foreach ($assignment as $value) {
    //       array_push($arrayTemp,  $value->teacher_id);
    //    }
    //    $teacher = Teacher::whereNotIn('id', $arrayTemp)->get();
    //    return response()->json(['teacher' => $teacher, 'data' => $data, 'assignment' => $arrayTemp]);
    // }
}
