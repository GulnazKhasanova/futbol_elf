<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use \App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\VoteController as AdminVoteController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\LogController as AdminLogController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\TopchartController;


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

Route::group(['middleware' => 'auth'], function() {
Route::resource('/account', AccountController::class);

Route::get('/logaut', function() {
    Auth::logout();
    return redirect()->route('login');
})->name('account.logout');


Route::group(['as'=>'admin.', 'prefix'=>'admin', 'middleware' => 'admin'], function(){
    Route::view('/', 'admin.index')->name('index');
    Route::resource('/categorys', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/role', AdminRoleController::class);
    Route::resource('/vote', AdminVoteController::class);
    Route::get('/logs', [AdminLogController::class, 'index'])
        ->name('logs.index');
});
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/action/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::get('/vote', [VoteController::class, 'index'])
    ->name('vote.index');
Route::get('/vote/action/{vote}', [VoteController::class, 'show'])
    ->where('vote', '\d+')
    ->name('vote.show');

Route::get('/topchart', [TopchartController::class, 'index'])
    ->name('topchart.index');
Route::get('/topchart/action/{topchart}', [TopchartController::class, 'show'])
    ->where('topchart', '\d+')
    ->name('topchart.show');


//Route::get('addLog',[LogController::class, 'myTestAddToLog']);
//Route::get('logActivity',[LogController::class, 'logActivity']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
