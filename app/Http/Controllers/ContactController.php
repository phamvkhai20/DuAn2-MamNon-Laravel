<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContacModel;
class ContactController extends Controller
{
    public function lien_he_truong_hoc()
    {
       return view('web.page.lien-he');
    }
    public function add()
    {
        $contact = ContacModel::all();
        return view('web.lien-he', compact('contact'));
    }
    public function saveAdd(Request $request)
    {
        $request->validate([
            'contact_name' => 'required|max:250',
            'contact_phone' => 'required|min:10|numeric',
            'contact_email' => 'required',
            'detail' => 'required',
        ],[
            'contact_name.required' => 'Phải nhập họ tên',
            'contact_name.max' => 'Nhỏ hơn 250 ký tự',
            'contact_phone.required' => 'Phải nhập số điện thoại',
            'contact_phone.min' => 'Số điện thoại lớn hơn 10 số',
            'contact_phone.numeric' => 'Sai định dạng',
            'contact_email.required' => 'Phải nhập email',
            'detail.required' => 'Phải nhập tin nhắn',
        ]);
        $data = request()->all();
        ContacModel::create($data);
        return redirect()->route('web.lien-he');
    }
}
