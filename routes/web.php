<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User\KeranjangController;

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

    Route::get('admin/order', [App\Http\Controllers\Admin\HomeAdmin::class, 'order'])->name('order.admin');





});

Route::middleware(['auth','CekLevel:2'])->group(function () {
    Route::get('kasir-dashboard', [App\Http\Controllers\Kasir\HomeController::class, 'index'])->name('dashboard.kasir');
    Route::get('kasir/transaksi/pesanan-baru', [App\Http\Controllers\Kasir\TransaksiController::class, 'index'])->name('kasir.transaksi');
    Route::get('kasir/transaksi/pesanan-baru/detail/{id}', [App\Http\Controllers\Kasir\TransaksiController::class, 'detail'])->name('kasir.transaksi.detail');
    Route::get('kasir/transaksi/konfirmasi/{id}', [App\Http\Controllers\Kasir\TransaksiController::class, 'konfirmasi'])->name('kasir.transaksi.konfirmasi');
    Route::get('kasir/transaksi/selesai', [App\Http\Controllers\Kasir\TransaksiController::class, 'transaksi_selesai'])->name('kasir.transaksi.selesai');
});

Route::middleware(['auth','CekLevel:4'])->group(function () {
    Route::get('home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.dashboard');
    Route::post('home',[App\Http\Controllers\User\KeranjangController::class, 'simpan'])->name('user.keranjang.simpan');
    // Route::get('keranjang', [App\Http\Controllers\User\KeranjangController::class, 'index'])->name('user.keranjang');
    Route::resource('keranjang', KeranjangController::class);
    Route::get('/checkout',[App\Http\Controllers\User\CheckoutController::class, 'index'])->name('user.checkout');
    Route::post('keranjang', [App\Http\Controllers\User\OrderController::class, 'simpan'])->name('user.order.simpan');
    Route::get('order', [App\Http\Controllers\User\OrderController::class, 'index'])->name('user.order');
    Route::get('order/detail/{id}',[App\Http\Controllers\User\OrderController::class, 'detail'])->name('user.order.detail');


});
