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

Route::get('/', 'HomeController@index')->name('index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pemilik', 'PemilikController@index')->name('pemilik.index');
Route::post('/pemilik', 'PemilikController@store')->name('pemilik.store');
Route::delete('/pemilik/{id}', 'PemilikController@destroy')->name('pemilik.destroy');

Route::get('/kendaraan', 'KendaraanController@index')->name('kendaraan.index');
Route::post('/kendaraan', 'KendaraanController@store')->name('kendaraan.store');
Route::delete('/kendaraan/{id}', 'KendaraanController@destroy')->name('kendaraan.destroy');

Route::get('/parkir', 'ParkirController@index')->name('parkir.index');

