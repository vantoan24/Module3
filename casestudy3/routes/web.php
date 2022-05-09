<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('front.index');
// });

// Route::get('/login',[AuthController::class,'login'])->name('login');
// Route::post('/login',[AuthController::class,'postLogin'])->name('login');
// Route::get('/logout',[AuthController::class,'logout'])->name('logout');
// // Route::post('/Login',[AuthController::class,'logout'])->name('login');
// Route::get('/', function () {
//         return view('Admin.index');
//     })->name('adminindex');
Route::group(['prefix' => 'admin'], function (){
    Route::get('login', [AuthController::class,'login'])->name('login');
    Route::get('logout', [AuthController::class,'logout'])->name('Logout');
    Route::post('postLogin', [AuthController::class,'postLogin'])->name('postLogin');
    Route::resource('category', CategoryController::class);
    // Route::resource('dashboard', DBController::class);
    // Route::resource('order', OrderController::class);
    // Route::post('search', [ProductController::class, 'search'])->name('search');
    // Route::resource('product', ProductController::class);
    // Route::resource('transaction', TransactionController::class);
    // Route::resource('user', UserController::class);

});


