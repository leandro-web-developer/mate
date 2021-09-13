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

Route::post('enviar', [App\Http\Controllers\EmailController::class, 'store']);

Route::get('elpais', [App\Http\Controllers\EditorController::class, 'elPais']);
Route::get('elobservador', [App\Http\Controllers\EditorController::class, 'elObservador']);