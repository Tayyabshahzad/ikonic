<?php

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('mark-suggestions', [App\Http\Controllers\HomeController::class, 'mark_suggestions'])->name('mark_suggestions');
Route::post('withdraw-request', [App\Http\Controllers\HomeController::class, 'withdraw_request'])->name('withdraw_request');
Route::post('accept-request', [App\Http\Controllers\HomeController::class, 'accept_request'])->name('accept_request');
Route::post('connection-remove', [App\Http\Controllers\HomeController::class, 'connection_remove'])->name('connection_remove');
Route::post('common-connection', [App\Http\Controllers\HomeController::class, 'common_connection'])->name('common_connection');
