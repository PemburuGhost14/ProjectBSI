<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\ArtikelController;
use App\Http\Controllers\Back\KategoriController;
use App\Http\Controllers\Back\dashboardController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/player', [HomeController::class, 'player'])->name('player');
//Route::get('/', function () {
//   return view('welcome');
//});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index']);

    Route::resource('artikel', ArtikelController::class);

    Route::resource('/kategori', KategoriController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);

    Route::resource('/users', UserController::class);

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
