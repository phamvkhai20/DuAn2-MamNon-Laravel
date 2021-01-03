<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GioithieuController extends Controller
{
    public function gioi_thieu_truong_hoc()
    {
       return view('web.page.gioi-thieu');
    }
}
