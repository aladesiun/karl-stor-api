<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::prefix('/dashboard')->group(function (){

    Route::get('/', function (){
        return view('admin.admins.index');
    });

    Route::get('/tables', [ProductController::class, 'getproducttable']);
    Route::get('/', [ProductController::class, 'getproductfordashboard']);
});
Route::get('/', function (){
    return view('admin.inc.app');
});

