<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addons\BlogController;
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
         // Blog
         Route::group(
            ['prefix' => 'blogs'],
            function () {
                Route::get('/', [BlogController::class, 'index']);
                Route::get('add', [BlogController::class, 'add']);
                Route::post('save', [BlogController::class, 'save']);
                Route::get('edit-{slug}', [BlogController::class, 'edit']);
                Route::post('update-{slug}', [BlogController::class, 'update']);
                Route::get('delete-{slug}', [BlogController::class, 'delete']);
            }
        );
    });
});

$domain = env('WEBSITE_HOST');

$parsedUrl = parse_url(url()->current());

$host = $parsedUrl['host'];
if (array_key_exists('host', $parsedUrl)) {
    // if it is a path based URL
    if ($host == env('WEBSITE_HOST')) {
        $domain = $domain;
        $prefix = '{vendor}';
    }
    // if it is a subdomain / custom domain
    else {
        $prefix = '';
    }
}

Route::group(['namespace' => "front", 'prefix' => $prefix, 'middleware' => 'FrontMiddleware'], function () {
    Route::get('/blogs', [BlogController::class, 'blogs']);
    Route::get('/blogs-{slug}', [BlogController::class, 'blogdetails']);
});