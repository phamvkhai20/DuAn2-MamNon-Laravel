<?php

namespace App\Http\Controllers\Web\NhaTruong;
use App\{Teacher,TeacherType};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Arr;

class TeacherController extends Controller
{
   public function index()
   {
      $data['teachers'] = Teacher::paginate(10);
       return view('staff.quan-ly-giao-vien.index', $data);
   }
   public function create()
   {
      $data['teacher_types'] = TeacherType::all();
      return view('staff.quan-ly-giao-vien.add',$data);
   }

   public function store(Request $request){
      $data = Arr::except($request->all(),['_token']);
      $data['password']= bcrypt($data['password']);
      if($request->hasFile('avatar')){
         $file=$request->file('avatar');
         $data['avatar'] = $file->getClientOriginalName(); 
         $request->file('avatar')->storeAs('images', $data['avatar'], 'public');
      }else{
         $data['avatar']='';
      }
      // dd($data);
      Teacher::create($data);
      return redirect()->route('giao-vien.index')->with('thongbao','Thêm Tài Khoản Thành Công');
   }
   
   public function edit($id){
      $data["teacher"] = Teacher::find($id);
      $data['teacher_types'] = TeacherType::all();
      return view('staff.quan-ly-giao-vien.edit', $data);
   }

   public function update(Request $request, $id){
      $teacher = Teacher::find($id);
      $data = Arr::except(request()->all(), ["_token ,'_method'"]);
      $data = Arr::except($request->all(),['_token']);
      $data['password']= bcrypt($data['password']);
      if($request->hasFile('avatar')){
         $file=$request->file('avatar');
         $data['avatar'] = $file->getClientOriginalName(); 
         $request->file('avatar')->storeAs('images', $data['avatar'], 'public');
      }else{
         $data['avatar'] = $teacher->avatar;
      }
      $teacher->update($data);
      return redirect()->route('giao-vien.index')->with('thongbao','Thêm Tài Khoản Thành Công');
   }
}
