<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\ContactBook;
use App\Models\Kid;
use Illuminate\Http\Request;

class ContactBookController extends Controller
{
    protected function danh_sach_so_lien_lac()
    {
        $kid = Kid::find(session('id_kid_default'));
        $contactBook=ContactBook::where('kid_id',session('id_kid_default'))->with(['replyToComment'=>function($query){
            $query->with('response_comment','comment');
        }])->orderBy('id','desc')->get();
        return view('staff.phu-huynh.so-lien-lac.danh-sach', ['kid' => $kid,'contactBook'=>$contactBook]);
    }
}
