<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function index()
    {
       return view('staff.giao-vien.dashboard.index');
    }
}
