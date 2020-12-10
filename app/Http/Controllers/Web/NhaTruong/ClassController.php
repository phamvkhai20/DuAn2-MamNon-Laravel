<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Models\Assignment;
use App\Models\Classes;
use App\Models\ClassModel;
use App\Models\SchoolYearModel;
use App\Models\GradeModel;
use PhpParser\Builder\Class_;

class ClassController extends Controller
{
    public function index()
    {
        $grades = GradeModel::with(['classes' => function ($query) {
            $query->with('kids', 'school_years')->with(['assignments' => function ($querys) {
                $querys->with('teacher');
            }]);
        }])->get();
        return view('staff.nha-truong.quan-ly-lop.index', compact('grades'));
    }
    public function edit($id)
    {
        $class = Classes::where("id", $id)->with(['assignments' => function ($querys) {
            $querys->with('teacher');
        }])->first();
        $grade = GradeModel::all();
        $year = SchoolYearModel::orderBy('id', 'desc')->limit(1)->first();;
        return view('staff.nha-truong.quan-ly-lop.edit', compact('class', 'grade', 'year'));
    }
    public function saveEdit(ClassRequest $request, $id)
    {

        $data = ClassModel::find($id);
        $teachers = request()->get('param');
        if (!empty($teachers)) {
            $assignment = Assignment::where('class_id', $id)->delete();
            foreach ($teachers as $teacher) {
                $dataTeacher = [
                    'school_year_id' => request()->get('school_year_id'),
                    'class_id' => $id,
                    'teacher_id' => $teacher
                ];
                Assignment::create($dataTeacher);
            }
        } else {
            $assignment = Assignment::where('class_id', $id)->delete();
        }

        $data->update(request()->all());
        return redirect()->route('nha-truong.lop.index');
    }
    public function add()
    {
        $class = ClassModel::all();
        $grade = GradeModel::all();
        $year = SchoolYearModel::orderBy('id', 'desc')->limit(1)->first();;
        return view('staff.nha-truong.quan-ly-lop.add', compact('grade', 'year'));
    }
    public function saveAdd(ClassRequest $request)
    {
        $data = request()->all();
        $teachers = request()->get('param');
        $class = ClassModel::create($data);
        if (!empty($teachers)) {
            foreach ($teachers as $teacher) {
                $dataTeacher = [
                    'school_year_id' => request()->get('school_year_id'),
                    'class_id' => $class->id,
                    'teacher_id' => $teacher
                ];
                Assignment::create($dataTeacher);
            }
        }
        return redirect()->route('nha-truong.lop.index');
    }
    public function delete($id)
    {
        $class = ClassModel::find($id);
        $class->delete($id);
        return redirect()->back();
    }
}