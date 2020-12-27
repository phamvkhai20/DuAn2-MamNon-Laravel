<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Kid, Classes, Parents,Grade,History};
use App\Http\Requests\Kid\{KidRequest, EditKidRequest};
use DB;
use Arr;
use Carbon\Carbon;


class KidController extends Controller
{
    public function index()
    {
        $data['kids'] = Kid::orderBy('id', 'desc')->paginate(10);
        return view('staff.giao-vien.thong-tin-tre.index', $data);
        
    }
}
