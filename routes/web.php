<?php

use App\Http\Controllers\CrudController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:admin']], function(){
    Route::get('/mng-inventory', [App\Http\Controllers\CrudController::class, 'mnginventory']);
    Route::get('/grafik-inventory', [App\Http\Controllers\CrudController::class, 'grafikinventory']);
    Route::get('/grafik-pembelian', [App\Http\Controllers\CrudController::class, 'grafikpembelian']);
    Route::get('/list-pembelian', [App\Http\Controllers\CrudController::class, 'listpembelian']);
    Route::get('/TambahInvent', [App\Http\Controllers\CrudController::class, 'tambahinvent']);
    Route::post('/simpanInvent', [App\Http\Controllers\CrudController::class, 'simpanInvent']);
    Route::get('/edit/{id}', [App\Http\Controllers\CrudController::class, 'edit']);
    Route::post('/update/{id}', [App\Http\Controllers\CrudController::class, 'update']);
    Route::get('/delete/{id}', [App\Http\Controllers\CrudController::class, 'destroy']);
    Route::get('/list-supplier', [App\Http\Controllers\CrudController::class, 'listsupplier']);
    Route::post('/done/{id}', [App\Http\Controllers\CrudController::class, 'done']);
});
   
Route::group(['middleware' => ['role:user']], function(){
    Route::get('/list-inventory', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/list-purchasing', [App\Http\Controllers\UserController::class, 'listpurchasing']);
    Route::get('/checkout/{id}', [App\Http\Controllers\UserController::class, 'checkout']);
    Route::post('/cetak-resi/{id}', [App\Http\Controllers\UserController::class, 'cetakresi']);
});