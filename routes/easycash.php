<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addons\EasyCashController;


Route::post('/orders/easycashrequest', [EasyCashController::class, 'front_easycashrequest']);
