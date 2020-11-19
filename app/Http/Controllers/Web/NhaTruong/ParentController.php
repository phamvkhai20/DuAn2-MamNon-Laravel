<?php

namespace App\Http\Controllers\Web\NhaTruong;
use App\Models\Parents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Arr;
use App\Http\Requests\Parent\{ParentRequest,EditParentRequest};

class ParentController extends Controller
{
   public function index()
   {
      $data['parents'] = Parents::paginate(10);
       return view('staff.quan-ly-phu-huynh.index',$data);
   }
   public function create()
   {
      
      return view('staff.quan-ly-phu-huynh.add');
   }

   public function store(ParentRequest $request){
      $data = Arr::except($request->all(),['_token']);
      
      $data['password']= bcrypt('123456');
      if($request->hasFile('parent_avatar')){
         $avatar = $request->file('parent_avatar');
         $getAvatar = time().'_'.$avatar->getClientOriginalName();
         $destinationPath = public_path('upload/avatar');
         $avatar->move($destinationPath, $getAvatar);
         $data['parent_avatar'] = $getAvatar;
      }else{
         $data['parent_avatar'] = "";
      }
      Parents::create($data);
      request()->flashOnly('paren_name');
      request()->flashOnly('email');
      request()->flashOnly('phone');
      request()->flashOnly('parent_status');
      request()->flashOnly('parent_avatar');
      return redirect()->route('phu-huynh.index');
   }
   
   public function edit($id){
     $data['parent'] = Parents::find($id);
      return view('staff.quan-ly-phu-huynh.edit',$data);
   }

   public function update(EditParentRequest $request, $id){
      $parent = Parents::find($id);
      $data = Arr::except(request()->all(), ["_token ,'_method'"]);
      $data = Arr::except($request->all(),['_token']);
      if($request->hasFile('parent_avatar')){
         $avatar = $request->file('parent_avatar');
         $getAvatar = time().'_'.$avatar->getClientOriginalName();
         $destinationPath = public_path('upload/avatar');
         $avatar->move($destinationPath, $getAvatar);
         $data['parent_avatar'] = $getAvatar;
      }else{
         $data['parent_avatar'] = $parent->parent_avatar;
      }
      $parent->update($data);
      return redirect()->route('phu-huynh.index');
   }
}
