<?php

namespace App\Controllers\Web;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function trang_chu()
    {
        return view('web.index');
    }

    public function nop_ho_so_nhap_hoc()
    {
        return view('web.page.nop-ho-so.index');
    }
}