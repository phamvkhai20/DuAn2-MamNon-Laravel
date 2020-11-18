<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SchoolYearModel;

class YearController extends Controller
{
     public function index()
   {
       $year=SchoolYearModel::all();
       return view('staff.quan-ly-nam-hoc.index',compact('year'));
   }
   public function edit($id)
   {
       $year=SchoolYearModel::find($id);
       return view('staff.quan-ly-nam-hoc.edit',compact('year'));
   }
   public function saveEdit(Request $request, $id)
   {
       $data=SchoolYearModel::find($id);
       $data->school_year = $request->school_year;
       $data->save();
       return redirect()->route('nam.index');
   }
    public function add()
   {
       $year= SchoolYearModel::all();
       return view('staff.quan-ly-nam-hoc.add',compact('year'));
   }
   public function saveAdd(Request $request)
   {
       $data= request()->all();
      SchoolYearModel::create($data);
       return redirect()->route('nam.index');
   }
   public function delete($id)
   {
       $year=SchoolYearModel::find($id);
       $year->delete($id);
       return redirect()->back();
   }
}
