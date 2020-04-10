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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//petugas
Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');
Route::get('/', function(){
  return Auth::user()->level;
})->middleware('jwt.verify');
Route::get('petugas', 'PetugasController@getAuthenticatedUser')->middleware('jwt.verify');

//penyewa
Route::get('Penyewa','PenyewaController@index')->middleware('jwt.verify');
Route::post('/add_Penyewa','PenyewaController@store')->middleware('jwt.verify');
Route::put('/up_Penyewa/{id}','PenyewaController@update')->middleware('jwt.verify');
Route::get('/tampil_Penyewa','PenyewaController@tampil')->middleware('jwt.verify');
Route::delete('/del_Penyewa/{id}','PenyewaController@destroy')->middleware('jwt.verify');

//JMobil
Route::get('JMobil','JMobilController@index')->middleware('jwt.verify');
Route::post('/add_JMobil','JMobilController@store')->middleware('jwt.verify');
Route::put('/up_JMobil/{id}','JMobilController@update')->middleware('jwt.verify');
Route::get('/tampil_JMobil','JMobilController@tampil')->middleware('jwt.verify');
Route::delete('/del_JMobil/{id}','JMobilController@destroy')->middleware('jwt.verify');
