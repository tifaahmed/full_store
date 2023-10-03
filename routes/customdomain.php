<?php
use App\Http\Controllers\addons\CustomdomainController;
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
Route::group(['namespace' => 'App\Http\Controllers\addons', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => 'AuthMiddleware','prefix' => 'custom_domain'], function () {
        Route::get('/', [CustomdomainController::class, 'index'])->name('index');

        Route::post('save', [CustomdomainController::class, 'custom_domain']);
        Route::get('add', [CustomdomainController::class, 'add']);
        Route::get('status_change-{id}/{status}', [CustomdomainController::class, 'status_update']);
        Route::get('save', [CustomdomainController::class, 'save']);
    });
});
Route::namespace('front')->group(function () {
    Route::post('/service/apply', [FrontServiceController::class, 'applypromocode']);
    Route::post('/service/remove', [FrontServiceController::class, 'removepromocode']);
});
