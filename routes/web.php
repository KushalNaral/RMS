<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//adding new programme
Route::get('/rms/addClass', [ProgrammeController::class, 'index'])->name('index');


//enrolling student route
Route::get('/rms/addStudent', [StudentController::class, 'index']);

//login student route

Route::get('/rms/loginStudent', [StudentController::class, 'login'])->name('studentLogin');

//for api documentation

Route::get('/docs', function ()
{
    return view('swagger.index');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
