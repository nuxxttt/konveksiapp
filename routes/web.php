<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\KontigenController;
use App\Http\Controllers\PesilatController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JuriController;

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

require __DIR__ . '/auth.php';
Route::get('/auth/logout', function () {
    return view('auth.logout');
});
Route::group(['middleware'=>'auth'],function () {
    Route::get('/auth/login', function() {
        return redirect('/');
    });
    Route::get('/auth/register', function() {
        return redirect('/');
    });
});
Route::group(['prefix' => '/', 'middleware'=>'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
    Route::resource('kontigen', KontigenController::class);
    Route::resource('pesilat', PesilatController::class);
    Route::resource('peserta', PesertaController::class);
    Route::resource('event', EventController::class);
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('juri', JuriController::class);
    });
});