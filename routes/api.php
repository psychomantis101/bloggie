<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\TestimonialController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blog/featured', [BlogController::class, 'featured']);
Route::get('/blog/latest', [BlogController::class, 'latest']);
Route::get('/testimonial/latest', [TestimonialController::class, 'latest']);
