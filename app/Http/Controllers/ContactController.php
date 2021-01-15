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
        $data = request()->all();
        ContacModel::create($data);
        return redirect()->route('web.lien-he');
    }
}
