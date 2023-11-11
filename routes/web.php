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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\IsiRakController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProduksiHistoryController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\Distribusi2Controller;
use App\Http\Controllers\PengemasanController;
use App\Http\Controllers\KonversiController;
use App\Http\Controllers\PemotonganController;
use App\Http\Controllers\CetakPDFController;



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

$roles = [
    'admin', 'superadmin'
];
foreach ($roles as $roless) {
    Route::group(['prefix' => "$roless", 'middleware' => ['auth']], function () use ($roless) {
        Route::resource('barang', BarangController::class);
        Route::resource('mitra', MitraController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('produksi', ProduksiController::class);
        Route::resource('pengemasan', ProduksiController::class);
        Route::resource('profile', ProfileController::class);
        Route::resource('rak', RakController::class);
        Route::resource('pemotongan', PemotonganController::class);
        Route::resource('satuan', SatuanController::class);
        Route::resource('isirak', IsiRakController::class);
        Route::resource('history', HistoryController::class);
        Route::resource('cetakpdf', CetakPDFController::class);
        Route::resource('distribusi', DistribusiController::class);
        Route::resource('konversi', KonversiController::class);
        Route::get('settings', [SettingsController::class, 'index'])->name('admin.settings.index');
        Route::get('penjualan/create', [HistoryController::class, 'penjualan_create'])->name('admin.penjualan.create');
        Route::get('settings', [SettingsController::class, 'edit'])->name('admin.settings.edit');
        Route::put('settings', [SettingsController::class, 'update'])->name('admin.settings.update');
        Route::get('penjualan', [HistoryController::class, 'index'])->name('penjualan.index');
        Route::get('pembelian', [HistoryController::class, 'index'])->name('pembelian.index');
        Route::get('distribusihistory', [Distribusi2Controller::class, 'index'])->name('distribusishow.index');
        Route::get('produksihistory', [ProduksiHistoryController::class, 'index'])->name('produksihistory.index');
        Route::get('pengemasan/create', [PengemasanController::class, 'create'])->name('pengemasan.create');
        Route::get('pemotonganhistory', [PemotonganController::class, 'history'])->name('pemotongan.history');
        Route::get('pengemasanhistory', [PengemasanController::class, 'index'])->name('pengemasan.index');

    });
};
//Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
//Route::get('/mitra/{id}/edit', [MitraController::class, 'edit'])->name('mitra.edit');

// Your other routes outside of the admin prefix

Route::get('', [RoutingController::class, 'index'])->name('root');
Route::get('/home', fn () => view('index'))->name('home');
Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
Route::get('{any}', [RoutingController::class, 'root'])->name('any');
