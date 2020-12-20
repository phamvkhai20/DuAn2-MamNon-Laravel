<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThongbaoModel;

class ThongbaoController extends Controller
{
    public function index()
    {
       //$data['thongbao'] = ThongbaoModel::paginate(10);
       return view('staff.phu-huynh.thong-bao.index');
    }
   
}
