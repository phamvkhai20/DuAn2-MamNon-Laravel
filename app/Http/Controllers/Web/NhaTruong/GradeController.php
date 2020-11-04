<?php

namespace App\Http\Controllers\Web\NhaTruong;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeController extends Controller
{
     public function index()
   {
       return view('staff.quan-ly-khoi.index');
   }
   public function edit()
   {
       return view('staff.quan-ly-khoi.edit');
   }
    public function add()
   {
       return view('staff.quan-ly-khoi.add');
   }
}
