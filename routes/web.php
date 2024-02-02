<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLabelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\ProductLabel;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('pemasok.')
    ->prefix('pemasok')
    ->controller(PemasokController::class)
    ->group(function(){
        Route::post('create','create')->name('create');
        Route::put('update/{id}','update')->name('update');
        Route::delete('delete/{id}','delete')->name('delete');
    });

    Route::name('product.')
    ->prefix('product')
    ->controller(ProductController::class)
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::get('create','create')->name('create');
        Route::get('data','data')->name('data');
        Route::get('detail/{id}','detail')->name('detail');
        Route::get('edit/{id}','edit')->name('edit');

        Route::post('insert','insert')->name('insert');
        Route::put('update/{id}','update')->name('update');
        Route::put('labeling/{product_id}','labeling')->name('labeling');
        Route::delete('delete/{id}','delete')->name('delete');

        Route::get('rekap','rekapFindAll')->name('rekapFindAll');
    });


    Route::name('gudang.')
    ->prefix('gudang')
    ->controller(GudangController::class)
    ->group(function(){
        Route::get('index','index')->name('index');
        Route::get('tambah_gudang','tambahIndex');
        Route::post('create','create');
    });


    Route::name('produk_label.')
    ->prefix('produk_label')
    ->controller(ProductLabelController::class)
    ->group(function(){
        Route::get('produk/{label_id}','findAllWithProduct')->name('findAllWithProduct');
        Route::get('findAll','findAll')->name('findAllData');
        Route::post('create','create')->name('create');
    });


    Route::name('transaksi.')
    ->prefix('transaksi')
    ->controller(TransaksiController::class)
    ->group(function(){
        Route::get('rekap','rekapFindAll');
        Route::post('penjualan','penjualan');
        Route::post('pembelian','pembelian');
    });

    Route::prefix('user')
    ->name('user.')
    ->controller(UserController::class)
    ->group(function(){
        Route::get('/','userManagementIndex')->name('index');
        Route::get('show','show')->name('show');
        Route::delete('delete/{id}','delete')->name('delete');
    });

    Route::prefix('role')
    ->controller(RoleController::class)
    ->group(function(){
        Route::post('create','create');
        Route::delete('delete/{id}','delete');
    });
});

require __DIR__.'/auth.php';
