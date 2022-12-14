<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WebsiteSubscriptionController;
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

Route::post('post',[PostController::class,'store']);
Route::post('subscribe',[WebsiteSubscriptionController::class,'store']);
Route::post('web-site',[WebsiteController::class,'store']);

