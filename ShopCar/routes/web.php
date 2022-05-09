<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\DBController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\DetailController;
use App\Http\Controllers\website\QuickviewController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\GioHangController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\OrderedController;

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
// Route::get('/',[ HomeController::class, 'index'])->name('website.home.index');
Route::group(['prefix' => 'home'], function () { 
  Route::get('/',[ HomeController::class, 'index'])->name('website.home.index');
  Route::post('search',[ HomeController::class, 'search'])->name('website.home.search');
  Route::get('/contact',[ ContactController::class, 'index'])->name('website.shop.contact');
  Route::get('/shop',[ ShopController::class, 'index'])->name('website.shop.shop-page');
  Route::post('/search_shop',[ ShopController::class, 'search'])->name('website.shop.search_shop');
  Route::get('/shop/{id}',[ QuickviewController::class, 'index'])->name('website.shop.quickview');
  Route::get('/shop-details/{id}',[ DetailController::class, 'index'])->name('website.shop.shop-details');
  Route::post('/post-cart/{id}',[ GioHangController::class, 'post_to_cart'])->name('website.shop.post-cart');
  
  Route::get('/add-cart/{id}',[ GioHangController::class, 'add_to_cart'])->name('website.shop.add-cart');
  Route::get('/view-cart',[ GioHangController::class, 'index'])->name('website.shop.my-cart');
  Route::get('/destroy-cart/{id}',[ GioHangController::class, 'destroy'])->name('website.shop.destroy-cart');

  Route::get('/cart',[ GioHangController::class, 'index'])->name('cart.index');
  Route::post('/update-cart',[ GioHangController::class, 'update_cart'])->name('cart.update-cart');
  Route::get('/checkout',[ CheckoutController::class, 'index'])->name('website.shop.checkout');
  Route::post('/post-checkout',[ CheckoutController::class, 'post_checkout'])->name('website.shop.post-checkout');
  Route::get('/sucess',[ OrderedController::class, 'index'])->name('website.shop.ordered');
});

// Route::get('/shop', function (){
//     return view('shop.shop-page');
// });
// Route::get('/shop_details', function (){
//     return view('shop.shop-details');
// });
// Route::get('/cart', function (){
//     return view('shop.my-cart');
// });
// Route::get('/checkout', function (){
//     return view('shop.checkout');
// });
// Route::get('/ordered', function (){
//     return view('shop.ordered');
// });
// Route::get('/contact', function (){
//     return view('shop.contact');
// });

// Route::get('admin/login', ['as' => 'Login', 'uses' => 'Admin\LoginController@gLogin']);
// Route::post('admin/login', ['as' => 'Login', 'uses' => 'Admin\LoginController@Login']);
// Route::get('admin/logout', ['as' => 'Logout', 'uses' => 'Admin\LoginController@Logout']);

// Route::group(['middleware' => 'checkLogin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
// 	Route::get('/', function() {
// 		return view('admin.dashboard');
// 	});
// });

Route::group(['prefix' => 'admin'], function (){
    Route::get('login', [AdminController::class,'getLogin'])->name('login');
    Route::get('logout', [AdminController::class,'logout'])->name('postLogout');
    Route::post('postLogin', [AdminController::class,'login'])->name('postLogin');
    Route::resource('dashboard', DBController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('order', OrderController::class);
    Route::post('search', [ProductController::class, 'search'])->name('search');
    Route::resource('product', ProductController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('user', UserController::class);

});

