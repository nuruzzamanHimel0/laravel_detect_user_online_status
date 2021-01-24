<?php



//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');



Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
Route::get('/admin/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

Route::post('/admin/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');


