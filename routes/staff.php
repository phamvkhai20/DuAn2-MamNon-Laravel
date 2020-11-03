
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
    Route::get('them','Web\NhaTruong\ClassController@add')
    ->name('lop.them');
});

    //khối
    Route::group([
    'prefix'=>'khoi',
], function () {
   Route::get('danh-sach','Web\NhaTruong\GradeController@index')
    ->name('khoi.index');
    Route::get('sua','Web\NhaTruong\GradeController@edit')
    ->name('khoi.sua');
    Route::get('them','Web\NhaTruong\GradeController@add')
    ->name('khoi.them');
});

    //giáo viên
     Route::group([
    'prefix'=>'giao-vien',
], function () {
   Route::get('danh-sach','Web\NhaTruong\TeacherController@index')
    ->name('gv.index');
    Route::get('sua','Web\NhaTruong\TeacherController@edit')
    ->name('gv.sua');
    Route::get('them','Web\NhaTruong\TeacherController@add')
    ->name('gv.them');
});
});


