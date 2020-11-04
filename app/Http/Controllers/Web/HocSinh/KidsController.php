<?php

namespace App\Http\Controllers\Web\HocSinh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KidsController extends Controller
{
    public function list(){
        return view('staff.quan-ly-hoc-sinh.index');
    }
    public function add(){
        return view('staff.quan-ly-hoc-sinh.add');
    }
    public function edit(){
        return view('staff.quan-ly-hoc-sinh.edit');
    }
}
