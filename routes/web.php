<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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
    return view('admin/VLogin');
});

Route::get('karyawan', [WelcomeController::class, 'VKaryawan']);
Route::get('gaji', [WelcomeController::class, 'VGaji']);
Route::get('login', [WelcomeController::class, 'VLogin']);