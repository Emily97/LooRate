<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/bathrooms', 'BathroomController@bathroom');

Route::get('/user/bathrooms/',           'API\BathroomController@index'  );
Route::get('/admin/bathrooms/',           'API\BathroomController@index'  );

Route::get('/user/bathrooms/{id}',       'API\BathroomController@show');
Route::get('/admin/bathrooms/{id}',       'API\BathroomController@show');

Route::post('/user/bathrooms/',          'API\BathroomController@store');
Route::put('/admin/bathrooms/{id}',      'API\BathroomController@update');
Route::delete('/admin/bathrooms/{id}',   'API\BathroomController@delete');
