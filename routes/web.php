<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'prefix'=>'dang-nhap',
], function () {
    Route::get('phu-huynh', 'AuthController@form_login_parent')->name('login.parents');
    Route::get('nha-truong', 'AuthController@form_login_school')->name('login.school');
    Route::get('giao-vien', 'AuthController@form_login_teacher')->name('login.teacher');
});
Route::get('/', 'AuthController@home')->name('web.home');





