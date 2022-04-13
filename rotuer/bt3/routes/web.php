<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Tạo 1 nhóm route với tiền tố customer
Route::prefix('customers')->group(function () {
    // Route::get('index', function () {
        // Hiển thị danh sách khách hàng
        // return view('Moduels.customer.index');
    Route::get('/index', [IndexController::class, 'index' ])->name('customers.index');
        // Hiển thị Form tạo khách hàng
    Route::get('/create', [IndexController::class, 'create' ])->name('customers.create')->middleware('checkage');

    Route::post('/store', [IndexController::class, 'store' ]);
        // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form

    Route::get('/show/{id}', [IndexController::class, 'show' ]);
        // Hiển thị thông tin chi tiết khách hàng có mã định danh id

    Route::get('/edit/{id}',  [IndexController::class, 'edit']);
        // Hiển thị Form chỉnh sửa thông tin khách hàng

    Route::put('/update/{id}', [IndexController::class, 'update']);
        // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form

    Route::delete('destroy/{id}/',[IndexController::class, 'destroy']);
        // Xóa thông tin dữ liệu khách hàng
});

    Route::get('/profile', [AuthController::class, 'userProfile']);
    Route::resource('photos', CustomerController::class)->middleware('auth');
