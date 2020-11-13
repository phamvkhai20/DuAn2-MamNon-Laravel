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
    Route::get('sua','Web\NhaTruong\ClassController@edit')
    ->name('lop.sua');
    Route::get('them-moi','Web\NhaTruong\ClassController@add')
    ->name('lop.them-moi');
});

    //khối
    Route::group([
    'prefix'=>'khoi',
], function () {
   Route::get('danh-sach','Web\NhaTruong\GradeController@index')
    ->name('khoi.index');
    Route::get('sua','Web\NhaTruong\GradeController@edit')
    ->name('khoi.sua');
    Route::get('them-moi','Web\NhaTruong\GradeController@add')
    ->name('khoi.them-moi');
});

    //giáo viên
     Route::group([
    'prefix'=>'giao-vien',
], function () {
    Route::get('','Web\NhaTruong\TeacherController@index')
    ->name('giao-vien.index');
   Route::get('danh-sach','Web\NhaTruong\TeacherController@index')
    ->name('giao-vien.index');

    Route::get('sua/{id}','Web\NhaTruong\TeacherController@edit')
    ->name('giao-vien.sua');
    
    Route::post('sua/{id}','Web\NhaTruong\TeacherController@update')
    ->name('giao-vien.update');

    Route::get('them','Web\NhaTruong\TeacherController@create')
    ->name('giao-vien.them');
    Route::post('them','Web\NhaTruong\TeacherController@store')
    ->name('giao-vien.store');
});

Route::group([
    'prefix'=>'phu-huynh',
], function () {
   Route::get('danh-sach','Web\NhaTruong\ParentController@index')
    ->name('phu-huynh.index');

    Route::get('sua/{id}','Web\NhaTruong\ParentController@edit')
    ->name('phu-huynh.sua');
    
    Route::post('sua/{id}','Web\NhaTruong\ParentController@update')
    ->name('phu-huynh.update');

    Route::get('them','Web\NhaTruong\ParentController@create')
    ->name('phu-huynh.them');
    Route::post('them','Web\NhaTruong\ParentController@store')
    ->name('phu-huynh.store');
});

    Route::group([
        'prefix'=>'hoc-sinh',
    ], function () {
        Route::get('danh-sach', 'Web\HocSinh\StudentController@list')->name('hoc-sinh.index');
        Route::get('them-moi', 'Web\HocSinh\StudentController@add')->name('hoc-sinh.add');
        Route::get('sua', 'Web\HocSinh\StudentController@edit')->name('hoc-sinh.edit');
    });
});