<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
   public function index()
   {
       return view('staff.quan-ly-giao-vien.index');
   }
   public function add()
   {
      return view('staff.quan-ly-giao-vien.add');
   }
     public function edit()
   {
      return view('staff.quan-ly-giao-vien.edit');
   }
}
