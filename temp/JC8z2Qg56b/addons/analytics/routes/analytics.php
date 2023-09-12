<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addons\AnalyticsController;
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
        Route::middleware('VendorMiddleware')->group(function () {
            // Analytics
            Route::group(['prefix' => 'google_analytics'], function () {
                Route::get('', [AnalyticsController::class, 'index'])->name('google_analytics');
            });
        });
    });
});