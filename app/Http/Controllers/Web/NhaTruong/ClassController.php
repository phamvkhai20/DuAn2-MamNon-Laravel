<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Models\ClassModel;
use App\Models\SchoolYearModel;
use App\Models\GradeModel;

class ClassController extends Controller
{
    public function index()
    {
        $grades = GradeModel::with(['classes' => function ($query) {
            $query->with('kids', 'school_years')->count();
        }])->get();
        return view('staff.nha-truong.quan-ly-lop.index', compact('grades'));
    }
    public function edit($id)
    {
        $class = ClassModel::find($id);
        $grade = GradeModel::all();
        $year = SchoolYearModel::all();
        return view('staff.nha-truong.quan-ly-lop.edit', compact('class', 'grade', 'year'));
    }
    public function saveEdit(ClassRequest $request, $id)
    {
        $data = ClassModel::find($id)->update(request()->all());
        return redirect()->route('nha-truong.lop.index');
    }
    public function add()
    {
        $class = ClassModel::all();
        $grade = GradeModel::all();
        $year = SchoolYearModel::all();
        return view('staff.nha-truong.quan-ly-lop.add', compact('grade', 'year'));
    }
    public function saveAdd(ClassRequest $request)
    {
        $data = request()->all();
        ClassModel::create($data);
        return redirect()->route('nha-truong.lop.index');
    }
    public function delete($id)
    {
        $class = ClassModel::find($id);
        $class->delete($id);
        return redirect()->back();
    }
}