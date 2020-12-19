<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Models\{Assignment, Teacher, TeacherType};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Teacher\{TeacherRequest, EditTeacherRequest};
use Arr;

class TeacherController extends Controller
{
   public function index(Request $request)
   {
      if($request->all() != null && $request['page'] == null){
         foreach($request->all() as $key => $value){
             if($key == 'status'){
                 $data['teachers'] = Teacher::where("$key","$value")->orderBy('id', 'desc')->paginate(10);
             }
             elseif($key == 'fullname'){
               $data['teachers'] = Teacher::where("$key",'LIKE',"%$value%")->orderBy('id', 'desc')->paginate(10);
          }

         }
     }else{
         $data['teachers'] = Teacher::orderBy('id', 'desc')->paginate(10);
     }
     return view('staff.nha-truong.quan-ly-giao-vien.index', $data);
   }
   public function get_all_teacher(Request $request)
   {
      $data = $request->get('school_year');
      $assignment = Assignment::where('school_year_id', $data)->get();
      $arrayTemp = array();
      foreach ($assignment as $value) {
         array_push($arrayTemp,  $value->teacher_id);
      }
      $teacher = Teacher::whereNotIn('id', $arrayTemp)->get();
      return response()->json(['teacher' => $teacher, 'data' => $data, 'assignment' => $arrayTemp]);
   }

   public function create()
   {
      return view('staff.nha-truong.quan-ly-giao-vien.add');
   }
   public function store(TeacherRequest $request)
   {
      $data = Arr::except($request->all(), ['_token']);
      request()->flashOnly('fullname');
      request()->flashOnly('email');
      request()->flashOnly('phone');
      request()->flashOnly('date_of_birth');
      request()->flashOnly('gender');
      request()->flashOnly('status');
      $data['password'] = bcrypt('123456');
      $data['status'] = '1';
      if ($request->hasFile('avatar')) {
         $avatar = $request->file('avatar');
         $getAvatar = time() . '_' . $avatar->getClientOriginalName();
         $destinationPath = public_path('upload/avatar');
         $avatar->move($destinationPath, $getAvatar);
         $data['avatar'] = $getAvatar;
      } else {
         $data['avatar'] = "";
      }
      // dd($data);
      Teacher::create($data);
      session()->flash('message','Thêm mới giáo viên thành công!');
        return redirect()->back();
   }

   public function edit($id)
   {
      $data["teacher"] = Teacher::find($id);
      return view('staff.nha-truong.quan-ly-giao-vien.edit', $data);
   }

   public function update(EditTeacherRequest $request, $id)
   {

      $teacher = Teacher::find($id);
      $data = Arr::except(request()->all(), ["_token ,'_method'"]);
      $data = Arr::except($request->all(), ['_token']);
      if ($request->hasFile('avatar')) {
         $avatar = $request->file('avatar');
         $getavatar = time() . '_' . $avatar->getClientOriginalName();
         $destinationPath = public_path('upload/avatar');
         $avatar->move($destinationPath, $getavatar);
         $data['avatar'] = $getavatar;
      } else {
         $data['avatar'] = '';
      }
      
      Teacher::find($id)->update($data);
      session()->flash('message','Cập nhật thông tin giáo viên thành công!');
        return redirect()->back();
   }
}