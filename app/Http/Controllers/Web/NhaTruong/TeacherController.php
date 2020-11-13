<?php

namespace App\Http\Controllers\Web\NhaTruong;
use App\Models\{Teacher,TeacherType};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Teacher\{TeacherRequest,EditTeacherRequest};
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

   public function store(TeacherRequest $request){
      $data = Arr::except($request->all(),['_token']);
      request()->flashOnly('fullname');
      request()->flashOnly('email');
      request()->flashOnly('phone');
      request()->flashOnly('date_of_birth');
      request()->flashOnly('gender');
      request()->flashOnly('teacher_type_id');
      request()->flashOnly('status');
      request()->flashOnly('avatar');
      $data['password']= bcrypt('123456');
      if($request->hasFile('avatar')){
         $file=$request->file('avatar');
         $data['avatar'] = $file->getClientOriginalName(); 
         $request->file('avatar')->storeAs('images', $data['avatar'], 'public');
      }else{
         $data['avatar']='';
      }
      // dd($data);
      Teacher::create($data);
      return redirect()->route('giao-vien.index')->withInput();;
   }
   
   public function edit($id){
      $data["teacher"] = Teacher::find($id);
      $data['teacher_types'] = TeacherType::all();
      return view('staff.quan-ly-giao-vien.edit', $data);
   }

   public function update(EditTeacherRequest $request, $id){
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
      return redirect()->route('giao-vien.index');
   }
}
