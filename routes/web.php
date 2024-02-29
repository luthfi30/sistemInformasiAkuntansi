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


Route::get('/', 'DashboardController@dashboard');
Auth::routes();

Route::get('/akun', 'AkunController@index');
Route::get('/akun/create', 'AkunController@create');
Route::post('/akun/store', 'AkunController@store');
Route::get('/akun/edit/{no_reff}', 'AkunController@edit');
Route::post('/akun/update/{no_reff}', 'AkunController@update');
Route::get('/akun/delete/{no_reff}', 'AkunController@destroy');

Route::get('/transaksi', 'TransaksiController@index');
Route::get('transaksi/create', 'TransaksiController@create');
Route::post('/transaksi/store', 'TransaksiController@store');
Route::get('/transaksi/edit/{id}', 'TransaksiController@edit');
Route::post('/transaksi/update/{id}', 'TransaksiController@update');
Route::get('transaksi/delete/{id}', 'TransaksiController@destroy');

Route::get('/buku', 'TransaksiController@showbuku');
Route::get('/buku/{id}', 'TransaksiController@akunbuku');
Route::get('/buku/{id}/{waktu}', 'TransaksiController@detail');


Route::get('/neraca', 'TransaksiController@showneraca');
Route::get('/neraca/detail/{waktu}', 'TransaksiController@detailNeracaSaldo');
