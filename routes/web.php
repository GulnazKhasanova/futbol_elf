<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\LogController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['as'=>'admin.', 'prefix'=>'admin'], function(){
    Route::view('/', 'admin.index')->name('index');
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/action/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
Route::get('addLog',[LogController::class, 'myTestAddToLog']);
Route::get('logActivity',[LogController::class, 'logActivity']);

