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
    'prefix'=>'nha-truong',
], function () {
    Route::get('/', 'Web\NhaTruong\HomeController@index')->name('nha-truong.index');

    //lớp
 Route::group([
    'prefix'=>'lop',
], function () {
    Route::get('danh-sach','Web\NhaTruong\ClassController@index')
    ->name('lop.index');
    Route::get('sua/{id}','Web\NhaTruong\ClassController@edit')
    ->name('lop.sua');
     Route::post('luu-sua/{id}','Web\NhaTruong\ClassController@saveEdit')
    ->name('lop.save_edit');
    Route::get('them-moi','Web\NhaTruong\ClassController@add')
    ->name('lop.them-moi');
     Route::post('luu','Web\NhaTruong\ClassController@saveAdd')
    ->name('lop.save_add');
   Route:: get('xoa/{id}','Web\NhaTruong\ClassController@delete')
    ->name('lop.xoa');
});

    //khối
    Route::group([
    'prefix'=>'khoi',
], function () {
   Route::get('danh-sach','Web\NhaTruong\GradeController@index')
    ->name('khoi.index');
    Route::get('sua/{id}','Web\NhaTruong\GradeController@edit')
    ->name('khoi.sua');
   Route::post('luu-sua/{id}','Web\NhaTruong\GradeController@saveEdit')
    ->name('khoi.save_edit');
    Route::get('them-moi','Web\NhaTruong\GradeController@add')
    ->name('khoi.them_moi');
     Route::post('luu','Web\NhaTruong\GradeController@saveAdd')
    ->name('khoi.save_add');
   Route:: get('xoa/{id}','Web\NhaTruong\GradeController@delete')
    ->name('khoi.xoa');
});

    //năm
    Route::group([
    'prefix'=>'nam',
], function () {
   Route::get('danh-sach','Web\NhaTruong\YearController@index')
    ->name('nam.index');
    Route::get('sua/{id}','Web\NhaTruong\YearController@edit')
    ->name('nam.sua');
   Route::post('luu-sua/{id}','Web\NhaTruong\YearController@saveEdit')
    ->name('nam.save_edit');
    Route::get('them-moi','Web\NhaTruong\YearController@add')
    ->name('nam.them_moi');
     Route::post('luu','Web\NhaTruong\YearController@saveAdd')
    ->name('nam.save_add');
   Route:: get('xoa/{id}','Web\NhaTruong\YearController@delete')
    ->name('nam.xoa');
});

    //giáo viên
     Route::group([
    'prefix'=>'giao-vien',
], function () {
   Route::get('danh-sach','Web\NhaTruong\TeacherController@index')
    ->name('giao-vien.index');
    Route::get('sua','Web\NhaTruong\TeacherController@edit')
    ->name('giao-vien.sua');
    Route::get('them-moi','Web\NhaTruong\TeacherController@add')
    ->name('giao-vien.them-moi');
});

    Route::group([
        'prefix'=>'hoc-sinh',
    ], function () {
        Route::get('danh-sach', 'Web\HocSinh\StudentController@list')->name('hoc-sinh.index');
        Route::get('them-moi', 'Web\HocSinh\StudentController@add')->name('hoc-sinh.add');
        Route::get('sua', 'Web\HocSinh\StudentController@edit')->name('hoc-sinh.edit');
    });
});
