<?php

use App\Http\Controllers\UserController;
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

Route::get('home', function () {
    return view('welcome');
 })->name('home.index');
Route::get('login', [\App\Http\Controllers\LoginController::class, 'showFormLogin'])->name('auth.showFormLogin');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('auth.login');

Route::get('admin_login', [\App\Http\Controllers\AdminController::class, 'showFormLogin'])->name('admin.showFormLogin');
Route::post('admin_login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');

Route::resource('users', UserController::class);

 