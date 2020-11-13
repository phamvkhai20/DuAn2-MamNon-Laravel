<?php

namespace App\Http\Controllers\Web\NhaTruong;
use App\Parents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Arr;

class ParentController extends Controller
{
   public function index()
   {
      
       return view('staff.quan-ly-phu-huynh.index');
   }
   public function create()
   {
      
      return view('staff.quan-ly-phu-huynh.add');
   }

   public function store(Request $request){
      
   }
   
   public function edit($id){
     
      return view('staff.quan-ly-phu-huynh.edit');
   }

   public function update(Request $request, $id){
   }
}
