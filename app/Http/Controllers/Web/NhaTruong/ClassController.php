<?php

namespace App\Http\Controllers\Web\NhaTruong;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRequests;
use App\ClassModel;
use App\SchoolYearModel;
use App\GradeModel;

class ClassController extends Controller
{
   public function index()
   {
       $class = ClassModel::all();
    //    return $class;
       return view('staff.quan-ly-lop.index',compact('class'));
   }
   public function edit($id)
   {
       $class=ClassModel::find($id);
       $grade=GradeModel::all();
       $year=SchoolYearModel::all();
       return view('staff.quan-ly-lop.edit',compact('class','grade','year'));
   }
   public function saveEdit(ClassRequest $req, $id)
   {
      $data= ClassModel::find($id);
      $data->name = $req->name;
      $data->grade_id = $req->grade_id;
      $data->school_year_id = $req->school_year_id;
      return redirect()->route('lop.index');

   }
    public function add()
   {
        $class = ClassModel::all();
       $grade = GradeModel::all();
       $year = SchoolYearModel::all();
       return view('staff.quan-ly-lop.add',compact('grade','year'));
   }
   public function saveAdd(ClassRequest $request)
   {
       $data= request()->all();
      ClassModel::create($data);
       return redirect()->route('lop.index');
   }
   public function delete($id)
   {
       $class=ClassModel::find($id);
       $class->delete($id);
       return redirect()->back();
   }
}
