<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('jwt.auth')->group(function (){
    Route::post('postproduct', [\App\Http\Controllers\ProductController::class, 'createproduct']);


});
Route::post('signup', [\App\Http\Controllers\SignupController::class, 'signup']);
Route::post('login', [\App\Http\Controllers\SignupController::class, 'login']);
Route::get('getproduct', [\App\Http\Controllers\ProductController::class, 'getproduct']);
Route::get('getrandomnumber', [\App\Http\Controllers\ProductController::class, 'randomNumber']);

