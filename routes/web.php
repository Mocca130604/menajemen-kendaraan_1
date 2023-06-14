<?php

use App\Http\Controllers\AgreementsController;
use App\Http\Controllers\Beranda;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\Superior;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\TypeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('login', [LoginController::class, 'index'])->name('login');

Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/process','process');
    Route::get('logout','logout');
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['checkAuth:admin']],function () {
        Route::resource('beranda', Beranda::class);
        Route::resource('cars', CarsController::class);
        Route::resource('type', TypeController::class);
        Route::resource('brand', BrandsController::class);
        Route::resource('driver', DriverController::class);
    });
    // Route::group(['middleware' => ['checkAuth:superior']],function () {
    //     Route::resource('superior', Superior::class);
    //     // Route::resource('agreement',AgreementsController::class);
    // });
    Route::resource('agreement',AgreementsController::class);
    Route::post('accept/{id}', [AgreementsController::class, 'accept']);
    Route::post('done/{id}', [AgreementsController::class, 'done']);
});
