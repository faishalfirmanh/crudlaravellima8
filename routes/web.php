<?php

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
    //return view('welcome');
    return view('auth.login');
});
Auth::routes();

Route::get('tam',function(){
  return view('layouts.global');
});

Auth::routes();

Route::resource("users", "UserController");



Route::get('/cat','ControllerCategory@cari')->name('category.cari');
Route::delete('/category/{id}/deletePermanent','ControllerCategory@deletePermanent')->name('category.deletePermanent');
Route::get('/category/{id}/restore','ControllerCategory@restore')->name('category.restore');
Route::get('/category/trash', 'ControllerCategory@trash')->name('category.trash');

Route::resource("category","ControllerCategory");
Route::resource("book","BookController");
Route::resource("order","OrderController");


Route::get("/karbon","ControllerCategory@karbon");

Route::get('/ajax/category/search','ControllerCategory@searchAjax'); //route ini untuk search Category
//yang digunakan pada create dan edit book.

Route::match(["GET", "POST"], "/register", function(){
 return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');
