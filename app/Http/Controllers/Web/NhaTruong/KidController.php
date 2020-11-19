<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Kid,Classes,Parents};
use App\Http\Requests\Kid\{KidRequest,EditKidRequest};
use DB;
use Arr;
class KidController extends Controller
{
    public function index(){
        $data['kids'] = Kid::paginate(10);
        return view('staff.quan-ly-hoc-sinh.index', $data);
    }
    public function create(){
        $data['classes'] = Classes::all();
        return view('staff.quan-ly-hoc-sinh.add', $data);
    }
    public function search(Request $request){
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Parents::where("phone",'LIKE',"$query")->first();
      }
      else
      {
       $data = Parents::all();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       
        $output .= '
            <input value='.$data->id.' name="parent_id" type="text" class="form-control m-input" style="display:none">
            <div class="form-group m-form__group">
                <label>Ảnh đại diện phụ huynh</label>
                <img src="'.asset('/storage/images/'."$data->parent_avatar").'" id="avatar" width="300px">
            </div>
            <div class="form-group m-form__group">
                <label>Họ tên phụ huynh</label>
                <input value='.$data->parent_name.' name="parent_name" type="text" class="form-control m-input" readonly>
            </div>
            <div class="form-group m-form__group">
                <label>Số điện thoại</label>
                <input value='.$data->phone.' name="phone" type="text" class="form-control m-input" placeholder="Nhập số điện thoại" readonly>
            </div>
            <div class="form-group m-form__group">
                <label>Email</label>
                <input value='.$data->email.' name="email" type="text" class="form-control m-input" placeholder="Nhập email" readonly>
            </div>
            <div class="form-group m-form__group">
                <label>Trạng thái</label>
                <select name="parent_status" id="cars" class="form-control" disabled>
                    <option @if ('.$data->parent_status.' == 0) selected @endif value="0">Khóa</option>
                    <option @if ('.$data->parent_status.' == 1) selected @endif value="1">Hoạt Động</option>
                </select>
            </div>
        ';
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function store(KidRequest $request){
        
        
        if( $request->has('check') ){
            $kid = new Kid();

            $kid->parent_id = $request->parent_id;
            $kid->kid_name = $request->kid_name;
            $kid->nickname = $request->nickname;
            $kid->gender = $request->gender;
            $kid->date_of_birth = $request->date_of_birth;
            $kid->address = $request->address;
            $kid->admission_date = $request->admission_date;
            $kid->class_id = $request->class_id;
            $kid->kid_status = $request->kid_status;
            $kid->description = $request->description;
            if($request->hasFile('kid_avatar')){
                $avatar = $request->file('kid_avatar');
                $getAvatar = time().'_'.$avatar->getClientOriginalName();
                $destinationPath = public_path('upload/avatar');
                $avatar->move($destinationPath, $getAvatar);
                $kid->kid_avatar = $getAvatar;
            }
            else{
            $kid->kid_avatar = '';
            }
        $kid->save();
        }
        else{
            $parent = new Parents();
            $parent->parent_name = $request->parent_name;
            $parent->phone = $request->phone;
            $parent->email = $request->email;
            $parent->password = bcrypt('123456');
            $parent->parent_status = $request->parent_status;
            $parent->parent_avatar=$request->file('parent_avatar');
            if($request->hasFile('parent_avatar')){
                $avatar = $request->file('parent_avatar');
                $getAvatar = time().'_'.$avatar->getClientOriginalName();
                $destinationPath = public_path('upload/avatar');
                $avatar->move($destinationPath, $getAvatar);
                $parent->parent_avatar = $getAvatar;
            }else{
                $parent->parent_avatar = '';
            }
            $parent->save();
            $kid = new Kid();
            $kid->parent_id = $parent->id;
            $kid->kid_name = $request->kid_name;
            $kid->nickname = $request->nickname;
            $kid->gender = $request->gender;
            $kid->date_of_birth = $request->date_of_birth;
            $kid->address = $request->address;
            $kid->admission_date = $request->admission_date;
            $kid->class_id = $request->class_id;
            $kid->kid_status = $request->kid_status;
            $kid->description = $request->description;
            if($request->hasFile('kid_avatar')){
                $avatar = $request->file('kid_avatar');
                $getAvatar = time().'_'.$avatar->getClientOriginalName();
                $destinationPath = public_path('upload/avatar');
                $avatar->move($destinationPath, $getAvatar);
                $kid->kid_avatar = $getAvatar;
            }else{
                $kid->kid_avatar = '';
            }
            $kid->save();
        }
        request()->flashOnly('check');
        request()->flashOnly('search');
        request()->flashOnly('kid_name');
        request()->flashOnly('nickname');
        request()->flashOnly('gender');
        request()->flashOnly('date_of_birth');
        request()->flashOnly('address');
        request()->flashOnly('admission_date');
        request()->flashOnly('class_id');
        request()->flashOnly('kid_status');
        request()->flashOnly('description');
        request()->flashOnly('kid_avatar');

        request()->flashOnly('parent_name');
        request()->flashOnly('phone');
        request()->flashOnly('email');
        request()->flashOnly('status');
        request()->flashOnly('parent_avatar');
        return redirect()->route('tre.index');
    }
    public function edit($id){
        $data['kid'] = Kid::find($id);
        $data['classes'] = Classes::all();
        return view('staff.quan-ly-hoc-sinh.edit',$data);
    }
    public function update(EditKidRequest $request, $id){
        $kid = Kid::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $data = Arr::except($request->all(),['_token']);
      
        if($request->hasFile('kid_avatar')){
            $avatar = $request->file('kid_avatar');
            $getAvatar = time().'_'.$avatar->getClientOriginalName();
            $destinationPath = public_path('upload/avatar');
            $avatar->move($destinationPath, $getAvatar);
            $kid->kid_avatar = $getAvatar;
        }else{
           $data['kid_avatar'] = $kid->kid_avatar;
        }
        $kid->update($data);
        return redirect()->route('tre.index');
     }
}
