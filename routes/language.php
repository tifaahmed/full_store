<?php


use App\Http\Controllers\addons\LanguageController;

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

Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => 'AuthMiddleware'], function () {
        Route::group(['prefix' => 'language-settings/language'], function () {
            Route::get('/add', [LanguageController::class,'add']);
		    Route::post('/store', [LanguageController::class,'store']);
            Route::get('/layout/status-{id}/{status}', [LanguageController::class,'status']);
        });
    });
});