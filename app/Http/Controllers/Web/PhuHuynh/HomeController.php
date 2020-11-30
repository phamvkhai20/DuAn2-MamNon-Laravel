<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function index()
    {
        return view('staff.phu-huynh.dashboard.index');
    }
    protected function set_default_kid(Request $request)
    {
        session(['id_kid_default' => $request->get('id')]);
        return redirect()->route('phu-huynh.index', ['id' => $request->get('id')]);
    }
}