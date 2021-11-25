<?php

use App\Models\Rombel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\StudentController;

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

Auth::routes();


Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::resource('student', StudentController::class);
    Route::resource('rombel', Rombel::class);
    Route::resource('rayon', RayonController::class);
    Route::resource('absen', AbsenController::class);
    Route::resource('admin', AdminController::class);
});

Route::middleware('auth:student')->group(function () {
    Route::get('absen', [AbsenController::class, 'index']);
});




Route::middleware('auth:admin')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth:student')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');