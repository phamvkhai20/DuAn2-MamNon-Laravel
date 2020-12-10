<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Kid;
use Illuminate\Http\Request;

class InfoKidController extends Controller
{
    protected function index()
    {
        $infoKid = Kid::where('id', session('id_kid_default'))->with('getClass')->first();
        return view('staff.phu-huynh.thong-tin-tre.index', ['infoKid' => $infoKid]);
    }
}