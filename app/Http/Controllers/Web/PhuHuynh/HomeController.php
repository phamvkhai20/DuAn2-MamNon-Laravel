<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Classes;
use App\Models\Kid;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected function index()
    {
        $infoKid = Kid::find(session('id_kid_default'));
        $teachers = Assignment::where('class_id', Kid::find(session('id_kid_default'))->class_id)->with('teacher')->get();
        return view('staff.phu-huynh.dashboard.index', ['teachers' => $teachers]);
    }
    protected function set_default_kid(Request $request)
    {
        session(['id_kid_default' => $request->get('id')]);
        return redirect()->route('phu-huynh.index', ['id' => $request->get('id')]);
    }
}