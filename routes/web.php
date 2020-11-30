<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'prefix' => 'dang-nhap',
], function () {
    Route::get('phu-huynh', 'AuthController@form_login_parent')->name('form.parent');
    Route::post('phu-huynh', 'AuthController@loginParent')->name('login.parent');
    Route::get('logout1', 'AuthController@logoutParent')->name('logout.parent');

    Route::get('nha-truong', 'AuthController@form_login_school')->name('form.school');
    Route::post('nha-truong', 'AuthController@loginSchool')->name('login.school');
    Route::get('logout', 'AuthController@logoutSchool')->name('logout.school');

    Route::get('giao-vien', 'AuthController@form_login_teacher')->name('form.teacher');
    Route::post('giao-vien', 'AuthController@loginTeacher')->name('login.teacher');
    Route::get('logout2', 'AuthController@logoutTeacher')->name('logout.teacher');
});

Route::get('/', 'AuthController@home')->name('web.home');
Route::get('/nop-ho-so', 'AuthController@nop_ho_so_nhap_hoc')->name('web.nop-ho-so');




Route::group([
    'prefix' => 'phu-huynh',
    'middleware' => ['check_parent'],
], function () {
    Route::post('setDefaultKid', 'Web\PhuHuynh\HomeController@set_default_kid')->name('phu-huynh.set-default-kid');
    Route::group([
        'prefix' => '/{id}',
        'middleware' => ['check_parent'],
    ], function () {
        Route::get('/bang-tin', 'Web\PhuHuynh\HomeController@index')->name('phu-huynh.index');
        Route::get('/diem-danh', 'Web\PhuHuynh\AttendanceController@view_attendance')->name('phu-huynh.diem-danh');
    });
    //lớp
});