<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GopyController extends Controller
{
    public function index()
    {
       return view('staff.phu-huynh.gop-y.index');
    }
}
