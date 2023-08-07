<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserConnectionController;
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

Route::post('/send-connection-request', [App\Http\Controllers\ConnectionRequestController::class, 'store'])->name('send.connection.request');
Route::post('/withdraw-connection-request', [App\Http\Controllers\ConnectionRequestController::class, 'withdraw'])->name('withdraw.connection.request');
Route::post('/accept-connection-request', [App\Http\Controllers\ConnectionRequestController::class, 'accept'])->name('accept.connection.request');
Route::post('/remove-connection-request', [App\Http\Controllers\ConnectionRequestController::class, 'removeConnectionRequest'])->name('remove.connection.request');

