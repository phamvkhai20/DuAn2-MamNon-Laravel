<?php

namespace App\Http\Controllers\Web\NhaTruong;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
   public function index()
   {
       return view('staff.quan-ly-lop.index');
   }
   public function edit()
   {
       return view('staff.quan-ly-lop.edit');
   }
    public function add()
   {
       return view('staff.quan-ly-lop.add');
   }
}
