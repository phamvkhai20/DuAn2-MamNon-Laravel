<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThongbaoModel;

class ThongbaoController extends Controller
{
    public function index()
   {
      //$data['thongbao'] = ThongbaoModel::paginate(10);
      return view('staff.nha-truong.quan-ly-thong-bao.index');
   }
   public function add()
   {
       return view('staff.nha-truong.quan-ly-thong-bao.add');
   }
   public function detail()
   {
       return view('staff.nha-truong.quan-ly-thong-bao.detail');
   }
}
