<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addons\CouponsController;
use App\Http\Controllers\web\HomeController;
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
            // Coupons
            Route::group(['prefix' => 'coupons'], function () {
                Route::get('', [CouponsController::class, 'index'])->name('coupons');
                Route::get('/add', [CouponsController::class, 'add']);
                Route::post('/store', [CouponsController::class, 'store']);
                Route::get('/edit-{id}', [CouponsController::class, 'show']);
                Route::post('/update-{id}', [CouponsController::class, 'update']);
                Route::get('/status_change-{id}/{status}', [CouponsController::class, 'status_change']);
                Route::get('del-{id}', [CouponsController::class, 'del']);
            });
        });
    });
});
Route::namespace('front')->group(function () {
    Route::post('/cart/applypromocode', [HomeController::class, 'applypromocode']);
    Route::post('/cart/removepromocode', [HomeController::class, 'removepromocode']);
});
