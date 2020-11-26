<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function index()
    {
       return view('staff.nha-truong.dashboard.index');
    }
}
