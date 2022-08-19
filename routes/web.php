<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::middleware(['auth','CekLevel:1'])->group(function () {
    Route::get('dashboard-admin', [App\Http\Controllers\Admin\HomeAdmin::class, 'index'])->name('dashboard.admin');

    Route::get('pengguna/users', [App\Http\Controllers\Admin\HomeAdmin::class, 'users'])->name('pengguna.users');
    Route::post('pengguna/users', [App\Http\Controllers\Admin\HomeAdmin::class, 'create_users'])->name('create.users');

    Route::get('pengguna/level', [App\Http\Controllers\Admin\HomeAdmin::class, 'level'])->name('pengguna.level');
    Route::post('/pengguna/level', [App\Http\Controllers\Admin\HomeAdmin::class, 'store_level'])->name('store.level');
    Route::post('/pengguna/level{id}', [App\Http\Controllers\Admin\HomeAdmin::class, 'update_level'])->name('update.level');

    Route::get('menu', [App\Http\Controllers\Admin\HomeAdmin::class, 'menu'])->name('menu.admin');
    Route::post('/menu', [App\Http\Controllers\Admin\HomeAdmin::class, 'store_menu'])->name('store.menu');
    Route::post('/menu{id}', [App\Http\Controllers\Admin\HomeAdmin::class, 'update_menu'])->name('update.menu');
    Route::delete('/menu{id}', [App\Http\Controllers\Admin\HomeAdmin::class, 'destroy_menu'])->name('destroy.menu');

    Route::get('admin/transaksi', [App\Http\Controllers\Admin\HomeAdmin::class, 'transaksi'])->name('transaksi.admin');

    Route::get('admin/pemesanan', [App\Http\Controllers\Admin\HomeAdmin::class, 'pemesanan'])->name('pemesanan.admin');
});

Route::middleware(['auth','CekLevel:2'])->group(function () {
    Route::get('kasir-dashboard', [App\Http\Controllers\Kasir\KasirController::class, 'index'])->name('dashboard.kasir');
    Route::get('kasir/transaksi', [App\Http\Controllers\Kasir\KasirController::class, 'transaksi'])->name('transaksi.kasir');
});

Route::middleware(['auth','CekLevel:3'])->group(function () {
    Route::get('waiter-dashboard', [App\Http\Controllers\Waiter\WaiterController::class, 'index'])->name('dashboard.waiter');
    Route::get('waiter/pemesanan', [App\Http\Controllers\Waiter\WaiterController::class, 'pemesanan'])->name('pemesanan.waiter');
});
