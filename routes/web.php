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


Route::controller(FormController::class)->group(function() {
    Route::get('camp/{campId}/{siteId}', 'camp')->name('camp.index');
    Route::post('camp/reserve', 'reserve')->name('camp.reserve');
    Route::get('camp/form', 'form')->name('camp.form');
    Route::post('camp/confirm', 'confirm')->name('camp.confirm');
    Route::get('camp/complete', 'complete')->name('camp.complete');
    Route::post('camp/complete', 'register')->name('camp.register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
