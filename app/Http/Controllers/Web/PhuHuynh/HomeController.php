<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function index()
    {
        return view('staff.phu-huynh.dashboard.index');
    }
}