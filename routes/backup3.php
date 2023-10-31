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
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProduksiController;



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


Route::middleware(['role:admin'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('barang',
    'BarangController',
    [
        'names' => [
            'index'   => 'admin.barang.index',
            'create'  => 'admin.barang.create',
            'store'   => 'admin.barang.store',
            'update'  => 'admin.barang.update',
            'show'    => 'admin.barang.show',
            'edit'    => 'admin.barang.edit',
            'destroy' => 'admin.barang.destroy',
        ],
    ]
);

});

// Your other routes outside of the admin prefix

Route::get('', [RoutingController::class, 'index'])->name('root');
Route::get('/home', fn () => view('index'))->name('home');
Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
Route::get('{any}', [RoutingController::class, 'root'])->name('any');



