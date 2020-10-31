<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    protected function form_login_school()
    {
       return view('web.login.school');
    }
    protected function form_login_parent()
    {
       return view('web.login.parents');
    }
    protected function form_login_teacher()
    {
       return view('web.login.teacher');
    }
    protected function home()
    {
       return view('web.index');
    }
}
