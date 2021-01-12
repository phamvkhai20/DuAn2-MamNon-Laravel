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
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'detail' => 'required',
        ],[
            'contact_name.required' => 'Phải nhập họ tên',
            'contact_phone.required' => 'Phải nhập số điện thoại',
            'contact_email.required' => 'Phải nhập email',
            'detail.required' => 'Phải nhập tin nhắn',
        ]);
        $data = request()->all();
        ContacModel::create($data);
        return redirect()->route('web.lien-he');
    }
}
