<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\FormController;

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

Route::controller(ReserveController::class)->group(function() {
    Route::get('camp/reserve', 'add');
    Route::get('camp/complete', 'complete');
});


Route::controller(FormController::class)->group(function() {
    Route::get('camp/form', 'form')->name('camp.form');
    Route::get('camp/form_1', 'form_1')->name('camp.form_1');
     Route::get('camp/complete', 'complete')->name('camp.complete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
