<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContacModel;
class ContacControll extends Controller
{
    public function index()
    {
        $contact = ContacModel::all();
        return view('staff.nha-truong.quan-ly-lien-he.index', compact('contact'));
    }
}
