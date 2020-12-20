<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'prefix' => 'dang-nhap',
], function () {
    Route::group([
        'middleware' => ['check_login']
    ], function () {

        Route::get('phu-huynh', 'AuthController@form_login_parent')->name('form.parent');
        Route::post('phu-huynh', 'AuthController@loginParent')->name('login.parent');

        Route::get('nha-truong', 'AuthController@form_login_school')->name('form.school');
        Route::post('nha-truong', 'AuthController@loginSchool')->name('login.school');

        Route::get('giao-vien', 'AuthController@form_login_teacher')->name('form.teacher');
        Route::post('giao-vien', 'AuthController@loginTeacher')->name('login.teacher');
    });
    Route::get('logout1', 'AuthController@logoutParent')->name('logout.parent');
    Route::get('logout', 'AuthController@logoutSchool')->name('logout.school');
    Route::get('logout2', 'AuthController@logoutTeacher')->name('logout.teacher');
});
Route::get('/', 'AuthController@home')->name('web.home');

Route::post('/nop-ho-so/gui', 'AdmissionRecordsController@them_moi')->name('web.ho-so-nhap-hoc');
Route::get('/nop-ho-so', 'AuthController@nop_ho_so_nhap_hoc')->name('web.nop-ho-so');
Route::get('/gioi-thieu', 'GioithieuController@gioi_thieu_truong_hoc')->name('web.gioi-thieu');


Route::get('/404', 'ErrorControler@page_error')->name('error.404');

Route::group([
    'prefix' => 'phu-huynh',
    'middleware' => ['check_parent'],
], function () {
    Route::get('danh-sach-cac-thong-bao', 'Web\NhaTruong\NotificationController@indexParent')
    ->name('phu-huynh.thong-bao.index');
    Route::post('setDefaultKid', 'Web\PhuHuynh\HomeController@set_default_kid')->name('phu-huynh.set-default-kid');
    Route::group([
        'prefix' => '/{id}',
        'middleware' => ['check_parent'],
    ], function () {


        
        Route::get('so-lien-lac', 'Web\PhuHuynh\ContactBookController@danh_sach_so_lien_lac')->name('phu-huynh.so-lien-lac');
        Route::get('thong-tin-tre', 'Web\PhuHuynh\InfoKidController@index')->name('phu-huynh.thong-tin-tre');
        Route::post('/xin-nghi-hoc/them', 'Web\PhuHuynh\OffSchoolController@them_don_xin_nghi')->name('phu-huynh.them-don-xin-nghi');
        Route::get('/xin-nghi-hoc', 'Web\PhuHuynh\OffSchoolController@xin_nghi_hoc')->name('phu-huynh.xin-nghi-hoc');
        Route::get('/bang-tin', 'Web\PhuHuynh\HomeController@index')->name('phu-huynh.index');
        Route::get('/dang-ki-don', 'Web\PhuHuynh\ChildReceiptHistoryController@form_dang_ki')->name('phu-huynh.dang-ki-don');
        Route::get('/dang-ki-don/lich-su', 'Web\PhuHuynh\ChildReceiptHistoryController@lich_su_dang_ki_don')->name('phu-huynh.dang-ki-don.lich-su');
        Route::post('/luu-dang-ki-don', 'Web\PhuHuynh\ChildReceiptHistoryController@save_dang_ki')->name('phu-huynh.luu-diem-danh');
        Route::get('/diem-danh', 'Web\PhuHuynh\AttendanceController@view_attendance')->name('phu-huynh.diem-danh');
        Route::get('/lich-su-nghi', 'Web\PhuHuynh\AttendanceController@absence_history')->name('phu-huynh.lich-su-nghi');
       
    });
    //lớp
});