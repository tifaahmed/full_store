<?php
use App\Http\Controllers\addons\POSController;
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
Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => 'AuthMiddleware'], function () {
        // pos
        Route::group(
            ['prefix' => 'pos'],
            function () {
                Route::get('/', [POSController::class, 'index']);
                Route::post('/item-details', [POSController::class, 'item_details']);
                Route::post('/addtocart', [POSController::class, 'addtocart']);
                Route::post('/cart/qtyupdate', [POSController::class, 'qtyupdate']);
                Route::post('/cart/deletecartitem', [POSController::class, 'deletecart']);
                Route::post('/placeorder', [POSController::class, 'createorder']);
            }
        );
    });
});
