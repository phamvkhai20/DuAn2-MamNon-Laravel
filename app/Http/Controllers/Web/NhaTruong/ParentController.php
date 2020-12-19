<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Models\Parents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Arr;
use App\Http\Requests\Parent\{ParentRequest, EditParentRequest};

class ParentController extends Controller
{
   public function index(Request $request)
   {
      if($request->all() != null && $request['page'] == null){
         foreach($request->all() as $key => $value){
             if($key == 'parent_status'){
                 $data['parents'] = Parents::where("$key","$value")->orderBy('id', 'desc')->paginate(10);
             }
             elseif($key == 'parent_name'){
               $data['parents'] = Parents::where("$key",'LIKE',"%$value%")->orderBy('id', 'desc')->paginate(10);
          }
         
         }
     }else{
         $data['parents'] = Parents::orderBy('id', 'desc')->paginate(10);
     }
      return view('staff.nha-truong.quan-ly-phu-huynh.index', $data);
   }
   public function create()
   {
      
      return view('staff.nha-truong.quan-ly-phu-huynh.add');
   }
   public function store(ParentRequest $request)
   {
      $data = Arr::except($request->all(), ['_token']);
      request()->flashOnly('email');
      request()->flashOnly('parent_name');
      request()->flashOnly('phone');
      $data['password'] = bcrypt('123456');
      $data['parent_status'] = '1';
      if ($request->hasFile('parent_avatar')) {
         $avatar = $request->file('parent_avatar');
         $getAvatar = time() . '_' . $avatar->getClientOriginalName();
         $destinationPath = public_path('upload/avatar');
         $avatar->move($destinationPath, $getAvatar);
         $data['parent_avatar'] = $getAvatar;
      } else {
         $data['parent_avatar'] = "";
      }
      Parents::create($data);
      session()->flash('message','Thêm mới phụ huynh thành công!');
        return redirect()->back();
   }

   public function edit($id)
   {
      $data['parent'] = Parents::find($id);
      return view('staff.nha-truong.quan-ly-phu-huynh.edit', $data);
   }

   public function update(EditParentRequest $request, $id)
   {
      $parent = Parents::find($id);
      $data = Arr::except(request()->all(), ["_token ,'_method'"]);
      $data = Arr::except($request->all(), ['_token']);
      if ($request->hasFile('parent_avatar')) {
         $avatar = $request->file('parent_avatar');
         $getAvatar = time() . '_' . $avatar->getClientOriginalName();
         $destinationPath = public_path('upload/avatar');
         $avatar->move($destinationPath, $getAvatar);
         $data['parent_avatar'] = $getAvatar;
      } else {
         $data['parent_avatar'] = $parent->parent_avatar;
      }
      $parent->update($data);
      session()->flash('message','Cập nhật thông tin phụ huynh thành công!');
        return redirect()->back();
   }
}