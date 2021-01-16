<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolYearModel;

class YearController extends Controller
{
    public function index()
    {
        $year = SchoolYearModel::all();
        return view('staff.nha-truong.quan-ly-nam-hoc.index', compact('year'));
    }
    public function edit($id)
    {
        $year = SchoolYearModel::find($id);
        return view('staff.nha-truong.quan-ly-nam-hoc.edit', compact('year'));
    }
    public function saveEdit(Request $request, $id)
    {
        $data = SchoolYearModel::find($id);
        $data->school_year = $request->school_year;
        $data->save();
        return redirect()->route('nha-truong.nam.index');
    }
    public function add()
    {
        $year = SchoolYearModel::all();
        return view('staff.nha-truong.quan-ly-nam-hoc.add', compact('year'));
    }
    public function saveAdd(Request $request)
    {
        
        $request->validate([
            'school_year' => 'required|numeric',
        ],[
            'school_year.required' => 'Phải nhập năm học',
            'school_year.numeric' => 'Nhập sai định dạng !',
        ]);
        $data = request()->all();
        SchoolYearModel::create($data);
        return redirect()->route('nha-truong.nam.index');
    }
    public function delete($id)
    {
        $year = SchoolYearModel::find($id);
        $year->delete($id);
        return redirect()->back();
    }
}
