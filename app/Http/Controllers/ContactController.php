<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function lien_he_truong_hoc()
    {
       return view('web.page.lien-he');
    }
}
