<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    protected function trang_chu()
    {
       return view('web.index');
    }
}
