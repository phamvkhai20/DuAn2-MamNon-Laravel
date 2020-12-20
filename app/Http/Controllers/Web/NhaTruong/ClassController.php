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
use App\Models\Kid;
use App\Models\History;
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


    public function getClassAll()
    {
        $classes = Classes::with('assignments')->get();
        return response()->json(['classes' => $classes]);
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
        $data['status'] = '1';
        $teachers = request()->get('param');
        $class = ClassModel::create($data);
        if (!empty($teachers)) {
            foreach ($teachers as $teacher) {
                $dataTeacher = [
                    'school_year_id' => request()->get('school_year_id'),
                    'class_id' => $class->id,
                    'teacher_id' => $teacher,
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
    public function graduate($id)
    {
        $data['class'] = Classes::find($id);
        return view('staff.nha-truong.quan-ly-lop.graduate', $data);
    }
    public function save_graduate(Request $request, $id)
    {   
        $class = Classes::find($id);
        $data['status'] = '0';
        $class->update($data);
        $kids = Kid::where('class_id',$id)->get();
       
        foreach ($kids as $kid_id) {
            $kid = Kid::find($kid_id->id);
            $data['kid_status'] = '3';
            $kid->update($data);
        }
        foreach ($kids as $kid_id) {
            $history = new History();
            $history->class_id = $id;
            $history->kid_id = $kid_id->id;
            $history->date = $request->date;
            $history->status = '5';
            $history->save();
        }
        return redirect()->route('nha-truong.lop.index');
    }

    public function class_up()
    {
        $data['classes'] = Classes::where('status', '1')->get();
        $data['grades'] = GradeModel::all();
        return view('staff.nha-truong.quan-ly-lop.classup',$data);
    }
    public function save_class_up(Request $request)
    {   
            request()->flashOnly('old_class_id');
            request()->flashOnly('class_id');
            request()->flashOnly('grade_id');
        if ($request->has('check')) {
            
            if($request->old_class_id == $request->class_id){
                session()->flash('error','Lớp mới và lớp cũ trùng nhau!');
                return redirect()->back();
            }
            if($request->old_class_id == ""){
                session()->flash('error','Chưa chọn lớp cũ!');
                return redirect()->back();
            }
            if($request->class_id == ""){
                session()->flash('error','Chưa chọn lớp mới!');
                return redirect()->back();
            }
            $class = Classes::find($request->old_class_id);
            $data['status'] = '0';
            $class->update($data);

            $kids = Kid::where('class_id',$request->old_class_id)->get();
            foreach ($kids as $kid_id) {
            $kid = Kid::find($kid_id->id);
            $data['class_id'] = $request->class_id;
            $kid->update($data);

            $history = new History();
            $history->class_id = $request->class_id;
            $history->kid_id = $kid_id->id;
            $history->date = date("Y-m-d");
            $history->status = '3';
            $history->save();
            }
        }
        else{
            if($request->old_class_id == ""){
                session()->flash('error','Chưa chọn lớp cũ!');
                return redirect()->back();
            }
            if($request->grade_id == ""){
                session()->flash('error','Chưa chọn khối!');
                return redirect()->back();
            }
            if($request->class_name == ""){
                session()->flash('error','Vui lòng nhập tên lớp mới!');
                return redirect()->back();
            }
            
            $class = Classes::find($request->old_class_id);
            $data['status'] = '0';
            $class->update($data);

            $new_class = new Classes();
            $new_class->name = $request->class_name;
            $new_class->grade_id = $request->grade_id;
            $new_class->school_year_id = SchoolYearModel::orderBy('id', 'desc')->limit(1)->first()->id;
            $new_class->status = '1';

            $new_class->save($data);

            $kids = Kid::where('class_id',$request->old_class_id)->get();
            foreach ($kids as $kid_id) {
            $kid = Kid::find($kid_id->id);
            $data['class_id'] = $new_class->id;
            $kid->update($data);

            $history = new History();
            $history->class_id = $new_class->id;
            $history->kid_id = $kid_id->id;
            $history->date = date("Y-m-d");
            $history->status = '3';
            $history->save();
        }
    } 
        session()->flash('message','Lên lớp thành công!');
        return redirect()->back();
    }
    public function grade(Request $request)
    {    
        if ($request->ajax()) {
            $classes = Classes::where('grade_id', $request->grade_id)->where('status', '1')
            ->select('id', 'name')->get();
			return response()->json($classes);
        }  
    }
    
}