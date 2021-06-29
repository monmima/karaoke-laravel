<?php

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
//     return view('index');
// });

Route::get('/', "App\Http\Controllers\SongController@index");
Route::post('/create', "App\Http\Controllers\SongController@store");
Route::get('/{id}/edit', "App\Http\Controllers\SongController@edit");
Route::put('/{id}/edit', "App\Http\Controllers\SongController@update");
Route::delete('/{id}/delete', "App\Http\Controllers\SongController@destroy");





