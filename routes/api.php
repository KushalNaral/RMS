<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//for programme

Route::post('/addClass', [ApiAuthController::class, 'addClass'])->name('addclass');


//for students

Route::post('/addStudent', [ApiAuthController::class, 'enrollStudent'])->name('addStudent');

Route::post('/login', [ApiAuthController::class, 'login'])->name('loginStudent');


//all students
Route::get('/all', [ApiAuthController::class, 'showStudents']);
