<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PicnicRequest;
use App\Models\Picnic;

class PicnicController extends Controller
{
    public function index()
    {
       $picnic = Picnic::all();
       return view('staff.nha-truong.quan-ly-da-ngoai.index', compact('picnic'));
    }
     public function edit($id)
    {
        $picnic = Picnic::find($id);
        return view('staff.nha-truong.quan-ly-da-ngoai.edit', compact('picnic'));
    }
    public function saveEdit(Request $request, $id){
        $picnic = Picnic::find($id);
        // $picnic->fill($request->all());
        $picnic->name=$request->name;
        $picnic->time=$request->time;
        $picnic->address=$request->address;
        $picnic->price=$request->price;
        $picnic->name_parent=$request->name_parent;
        $picnic->description=$request->description;
        if ($request->hasFile('picnic_avatar')) {
         $avatar = $request->file('picnic_avatar');
         $getAvatar = time() . '_' . $avatar->getClientOriginalName();
         $destinationPath = public_path() . '/upload/avatar';
         $avatar->move($destinationPath, $getAvatar);
         $picnic->picnic_avatar= $getAvatar;
      } else {
         $picnic->picnic_avatar = "";
      }
      $picnic->save();
      return redirect()->route('nha-truong.dangoai.index');
    }
    public function add()
    {
        $picnic = Picnic::all();
        return view('staff.nha-truong.quan-ly-da-ngoai.add', compact('picnic'));
    }
      public function saveAdd(Request $request)
    {
        $picnic= new Picnic();
        $picnic->fill($request->all());
        if ($request->hasFile('picnic_avatar')) {
         $avatar = $request->file('picnic_avatar');
         $getAvatar = time() . '_' . $avatar->getClientOriginalName();
         $destinationPath = public_path() . '/upload/avatar';
         $avatar->move($destinationPath, $getAvatar);
         $picnic->picnic_avatar= $getAvatar;
      } else {
         $picnic->picnic_avatar = "";
      }
        $picnic->save();
        return redirect()->route('nha-truong.dangoai.index');
    }
}
