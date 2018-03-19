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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

Route::get   ('/admin/bathrooms/',          'Admin\BathroomController@index'  )->name('admin.bathrooms.index');
Route::get   ('/admin/bathrooms/create',    'Admin\BathroomController@create' )->name('admin.bathrooms.create');
Route::get   ('/admin/bathrooms/{id}',      'Admin\BathroomController@show'   )->name('admin.bathrooms.show');
Route::post  ('/admin/bathrooms/store',     'Admin\BathroomController@store'  )->name('admin.bathrooms.store');
Route::get   ('/admin/bathrooms/{id}/edit', 'Admin\BathroomController@edit'   )->name('admin.bathrooms.edit');
Route::put   ('/admin/bathrooms/{id}',      'Admin\BathroomController@update' )->name('admin.bathrooms.update');
Route::delete('/admin/bathrooms/{id}',      'Admin\BathroomController@destroy')->name('admin.bathrooms.destroy');

Route::get   ('/user/bathrooms/',          'User\BathroomController@index'  )->name('user.bathrooms.index');
Route::get   ('/user/bathrooms/create',    'User\BathroomController@create' )->name('user.bathrooms.create');
Route::get   ('/user/bathrooms/{id}',      'User\BathroomController@show'   )->name('user.bathrooms.show');
Route::post  ('/user/bathrooms/store',     'User\BathroomController@store'  )->name('user.bathrooms.store');
Route::get   ('/user/bathrooms/{id}/edit', 'User\BathroomController@edit'   )->name('user.bathrooms.edit');
Route::put   ('/user/bathrooms/{id}',      'User\BathroomController@update' )->name('user.bathrooms.update');
Route::delete('/user/bathrooms/{id}',      'User\BathroomController@destroy')->name('user.bathrooms.destroy');

// Comments Routes
Route::delete('/admin/bathroom/{id}/comments/{cid}', 'Admin\CommentController@destroy')->name('admin.comments.destroy');

Route::get   ('/user/bathroom/{id}/comments/create', 'User\CommentController@create')->name('user.comments.create');
Route::post  ('/user/bathroom/{id}/comments/store',  'User\CommentController@store')->name('user.comments.store');
