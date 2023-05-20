<?php

use App\Http\Controllers\api\v1\AuthApi;
use App\Http\Controllers\api\v1\master\UserApi;
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

Route::prefix('v1')->group(function(){
    Route::controller(AuthApi::class)->group(function(){
        Route::post('login', 'login');
        Route::post('register', 'register');
    });

    Route::middleware(['checkAuthApi'])->group(function(){
        // user
        Route::prefix('user')
            ->controller(UserApi::class)->group(function(){
                Route::get('/', 'index');
            });

    });
});
