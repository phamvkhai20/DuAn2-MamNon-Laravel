<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorControler extends Controller
{
    public function page_error()
    {
       return view('errors.404');
    }
}
