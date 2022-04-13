<?php

use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function (Illuminate\Http\Request $request) {
    if ($request->username == 'admin'
        && $request->password == 'admin') {
        return view('welcome_admin');
    }
    return view('login_error');
});
Route::get('/liba', function () {
    return view('libary');
});
Route::post('/liba', function (Request $request) {
    return view('libary');
});
//Them moi vao 
Route::get('/add', function () {
   return view('add_admin');
}) ->name('add');
//
Route::post('/store123', function (){

}) ->name('store');

Route::get('/edit/{id}',function($id){

}) ->name('edit');

Route::post('/update/{id}',function($id){

}) ->name('update');

Route::get('/list',function(){

}) ->name('list');

Route::delete('/delete/{id}',function($id){

}) ->name('delete');

Route::get('/show/{id}',function($id){

}) ->name('show');

Route::prefix('search')->group( function(){
  Route::get('/users', function () {
    return view('future');
  });
});

Route::get('/search', function () {
    return view('future');
});
Route::post('/search', [SearchController::class,"search"]);

Route::get('/calcu', function (){
    return view('calcucator');
    
});
Route::post('/calcu', [SearchController::class,"math"]);