<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'prefix'=>'dang-nhap',
], function () {
    Route::get('phu-huynh', [AuthController::class,'form_login_parent'])->name('login.parents');
    Route::get('nha-truong', [AuthController::class,'form_login_school'])->name('login.school');
    Route::get('giao-vien', [AuthController::class,'form_login_teacher'])->name('login.teacher');
	// Route::get('school/login', 'AuthController@login_school')->name('school.login');
});
Route::get('/', [AuthController::class,'home'])->name('web.home');



Route::group([
    'prefix'=>'nha-truong',
], function () {
    Route::group([
        'prefix'=>'hoc-sinh',
    ], function () {
        Route::get('danh_sach', 'Web\HocSinh\KidsController@list')->name('hocSinh.danh_sach');
        Route::get('them', 'Web\HocSinh\KidsController@add')->name('hocSinh.them');
        Route::get('sua', 'Web\HocSinh\KidsController@edit')->name('hocSinh.sua');
    });
});
