<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\NhaTruong\HomeController;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Aler;
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
    'prefix' => 'nha-truong',
    'as' => 'nha-truong.',
    'middleware' => ['check_school'],
], function () {
    Route::get('/', 'Web\NhaTruong\HomeController@index')->name('nha-truong.index');
    //lớp
    Route::group([
        'prefix' => 'lop',
    ], function () {
        Route::get('danh-sach', 'Web\NhaTruong\ClassController@index')
            ->name('lop.index');
        Route::get('sua/{id}', 'Web\NhaTruong\ClassController@edit')
            ->name('lop.sua');
        Route::post('luu-sua/{id}', 'Web\NhaTruong\ClassController@saveEdit')
            ->name('lop.save_edit');
        Route::get('them-moi', 'Web\NhaTruong\ClassController@add')
            ->name('lop.them-moi');
        Route::post('luu', 'Web\NhaTruong\ClassController@saveAdd')
            ->name('lop.save_add');
        Route::get('xoa/{id}', 'Web\NhaTruong\ClassController@delete')
            ->name('lop.xoa');

        Route::get('tot-nghiep/{id}', 'Web\NhaTruong\ClassController@graduate')->name('lop.graduate');
        Route::post('tot-nghiep/{id}', 'Web\NhaTruong\ClassController@save_graduate')->name('lop.save_graduate');
    });

    //khối
    Route::group([
        'prefix' => 'khoi',
    ], function () {
        Route::get('danh-sach', 'Web\NhaTruong\GradeController@index')
            ->name('khoi.index');
        Route::get('sua/{id}', 'Web\NhaTruong\GradeController@edit')
            ->name('khoi.sua');
        Route::post('luu-sua/{id}', 'Web\NhaTruong\GradeController@saveEdit')
            ->name('khoi.save_edit');
        Route::get('them-moi', 'Web\NhaTruong\GradeController@add')
            ->name('khoi.them_moi');
        Route::post('luu', 'Web\NhaTruong\GradeController@saveAdd')
            ->name('khoi.save_add');
        Route::get('xoa/{id}', 'Web\NhaTruong\GradeController@delete')
            ->name('khoi.xoa');
    });

    //năm
    Route::group([
        'prefix' => 'nam',
    ], function () {
        Route::get('danh-sach', 'Web\NhaTruong\YearController@index')
            ->name('nam.index');
        Route::get('sua/{id}', 'Web\NhaTruong\YearController@edit')
            ->name('nam.sua');
        Route::post('luu-sua/{id}', 'Web\NhaTruong\YearController@saveEdit')
            ->name('nam.save_edit');
        Route::get('them-moi', 'Web\NhaTruong\YearController@add')
            ->name('nam.them_moi');
        Route::post('luu', 'Web\NhaTruong\YearController@saveAdd')
            ->name('nam.save_add');
        Route::get('xoa/{id}', 'Web\NhaTruong\YearController@delete')
            ->name('nam.xoa');
    });

    //giáo viên
    Route::group([
        'prefix' => 'giao-vien',
    ], function () {
        Route::get('/get-list-teacher', 'Web\NhaTruong\TeacherController@index')
            ->name('giao-vien.list');
        Route::get('', 'Web\NhaTruong\TeacherController@get_all_teacher')
            ->name('giao-vien.get-list');
        Route::get('danh-sach', 'Web\NhaTruong\TeacherController@index')
            ->name('giao-vien.list');

        Route::get('sua/{id}', 'Web\NhaTruong\TeacherController@edit')
            ->name('giao-vien.sua');

        Route::post('sua/{id}', 'Web\NhaTruong\TeacherController@update')
            ->name('giao-vien.update');

        Route::get('them', 'Web\NhaTruong\TeacherController@create')
            ->name('giao-vien.them');
        Route::post('them', 'Web\NhaTruong\TeacherController@store')
            ->name('giao-vien.store');
    });

    Route::group([
        'prefix' => 'phu-huynh',
    ], function () {
        Route::get('danh-sach', 'Web\NhaTruong\ParentController@index')
            ->name('phu-huynh.list');
        Route::get('them', 'Web\NhaTruong\ParentController@create')
            ->name('phu-huynh.create');
        Route::post('them', 'Web\NhaTruong\ParentController@store')
            ->name('phu-huynh.store');
        Route::get('sua/{id}', 'Web\NhaTruong\ParentController@edit')->name('phu-huynh.edit');
        Route::post('sua/{id}', 'Web\NhaTruong\ParentController@update')->name('phu-huynh.update');
    });

    Route::group([
        'prefix' => 'tre',
    ], function () {
        Route::get('danh-sach', 'Web\NhaTruong\KidController@index')->name('tre.index');
        Route::get('them', 'Web\NhaTruong\KidController@create')->name('tre.create');
        Route::get('them/search', 'Web\NhaTruong\KidController@search')->name('tre.search');
        Route::post('them', 'Web\NhaTruong\KidController@store')->name('tre.store');
        Route::get('sua/{id}', 'Web\NhaTruong\KidController@edit')->name('tre.edit');
        Route::post('sua/{id}', 'Web\NhaTruong\KidController@update')->name('tre.update');

        Route::get('chuyen-lop', 'Web\NhaTruong\KidController@change')->name('tre.change');
        Route::post('chuyen-lop', 'Web\NhaTruong\KidController@save')->name('tre.save');
        Route::get('them/change_list', 'Web\NhaTruong\KidController@change_list')->name('tre.change_list');
        Route::get('chuyen-lop/{id}', 'Web\NhaTruong\KidController@change_class')->name('tre.change_class');
        Route::post('chuyen-lop/{id}', 'Web\NhaTruong\KidController@save_change')->name('tre.save_change');
        Route::get('thoi-hoc/{id}', 'Web\NhaTruong\KidController@stop')->name('tre.stop');
        Route::post('thoi-hoc/{id}', 'Web\NhaTruong\KidController@save_stop')->name('tre.save_stop');
        Route::get('lich-su/{id}', 'Web\NhaTruong\KidController@history')->name('tre.history');

    });
    Route::group([
        'prefix' => 'diem-danh',
        'as' => 'diem-danh.',
    ], function () {
        Route::get('diem-danh-chi-tiet-lop/{id}', 'Web\NhaTruong\AttendanceController@xem_diem_danh')->name('chi-tiet-lop');
        Route::get('danh-sach-lop', 'Web\NhaTruong\AttendanceController@list_class')->name('list');
    });
});
Route::group([
    'prefix' => 'giao-vien',
    'middleware' => ['check_teacher'],
], function () {

    
    Route::group([
        'prefix' => '/{id}/so-lien-lac',
    ], function () {
        Route::post('/tao-moi', 'Web\GiaoVien\ContactBookController@save_add_contact_book')->name('giao-vien.them-so-lien-lac.them-moi');
        Route::get('/', 'Web\GiaoVien\ContactBookController@form_add_contact_book')->name('giao-vien.them-so-lien-lac');
    });
    Route::group([
        'prefix' => 'diem-danh',
    ], function () {
        Route::get('/{id}', 'Web\GiaoVien\AttendanceController@giao_dien_diem_danh')->name('giao-vien.giao_dien_diem_danh');
        Route::post('/tao', 'Web\GiaoVien\AttendanceController@diem_danh_den')->name('giao-vien.diem_danh_den');
        Route::post('/update', 'Web\GiaoVien\AttendanceController@diem_danh_ve')->name('giao-vien.diem_danh_ve');
        Route::get('/{id}/lich-su', 'Web\GiaoVien\AttendanceController@xem_diem_danh')->name('giao-vien.xem_diem_danh');
    });
    Route::get('/thong-tin-tre/{id}', 'Web\GiaoVien\HomeController@infoKid')->name('giao-vien.xem-thong-tin-tre');
    Route::get('/', 'Web\GiaoVien\HomeController@index')->name('giao-vien.index');
    //lớp
});