<?php
use Illuminate\Support\Facades\Route;
use App\Http\AuthController;
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
    'prefix'=>'auth',
], function () {
	Route::get('school/login', 'AuthController@login_school')->name('school.login');
});
