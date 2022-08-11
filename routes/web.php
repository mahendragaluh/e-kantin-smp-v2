<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard-admin', [App\Http\Controllers\Admin\HomeAdmin::class, 'index'])->name('dashboard.admin');
    Route::get('pengguna/users', [App\Http\Controllers\Admin\HomeAdmin::class, 'users'])->name('pengguna.users');
    Route::get('pengguna/level', [App\Http\Controllers\Admin\HomeAdmin::class, 'level'])->name('pengguna.level');
    Route::post('/pengguna/level', [App\Http\Controllers\Admin\HomeAdmin::class, 'store_level'])->name('store.level');
    Route::post('/pengguna/level{id}', [App\Http\Controllers\Admin\HomeAdmin::class, 'update_level'])->name('update.level');
});
