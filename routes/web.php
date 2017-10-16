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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('anggota')->group(function(){
	Route::get('/', 'AnggotaController@index')->name('anggota.index');
	Route::post('/prosestambah', 'AnggotaController@store')->name('anggota.prosestambah');
	Route::get('/lihat/{id}', 'AnggotaController@show')->name('anggota.lihat');
	Route::get('/edit/{id}', 'AnggotaController@edit')->name('anggota.edit');
	Route::post('/prosesedit/{id}', 'AnggotaController@update')->name('anggota.prosesedit');
	Route::get('/delete/{id}', 'AnggotaController@destroy')->name('anggota.delete');
});

Route::prefix('petugas')->group(function(){
	Route::get('/', 'PetugasController@index')->name('petugas.index');
	Route::post('/prosestambah', 'PetugasController@store')->name('petugas.prosestambah');
	Route::get('/lihat/{id}', 'PetugasController@show')->name('petugas.lihat');
	Route::get('/edit/{id}', 'PetugasController@edit')->name('petugas.edit');
	Route::post('/prosesedit/{id}', 'PetugasController@update')->name('petugas.prosesedit');
	Route::get('/delete/{id}', 'PetugasController@destroy')->name('petugas.delete');
});

Route::prefix('simpanan')->group(function(){
	Route::get('/', 'SimpananController@index')->name('simpanan.index');
	Route::post('/prosestambah', 'SimpananController@store')->name('simpanan.prosestambah');
	Route::get('/lihat/{id}', 'SimpananController@show')->name('simpanan.lihat');
	Route::get('/edit/{id}', 'SimpananController@edit')->name('simpanan.edit');
	Route::post('/prosesedit/{id}', 'SimpananController@update')->name('simpanan.prosesedit');
	Route::get('/delete/{id}', 'SimpananController@destroy')->name('simpanan.delete');
});

Route::prefix('angsuran')->group(function(){
	Route::get('/', 'AngsuranController@index')->name('angsuran.index');
	Route::post('/prosestambah', 'AngsuranController@store')->name('angsuran.prosestambah');
	Route::get('/lihat/{id}', 'AngsuranController@show')->name('angsuran.lihat');
	Route::get('/edit/{id}', 'AngsuranController@edit')->name('angsuran.edit');
	Route::post('/prosesedit/{id}', 'AngsuranController@update')->name('angsuran.prosesedit');
	Route::get('/delete/{id}', 'AngsuranController@destroy')->name('angsuran.delete');
});

Route::prefix('kategoripinjaman')->group(function(){
	Route::get('/', 'KategoriPinjamanController@index')->name('kategoripinjaman.index');
	Route::post('/prosestambah', 'KategoriPinjamanController@store')->name('kategoripinjaman.prosestambah');
	Route::get('/lihat/{id}', 'KategoriPinjamanController@show')->name('kategoripinjaman.lihat');
	Route::get('/edit/{id}', 'KategoriPinjamanController@edit')->name('kategoripinjaman.edit');
	Route::post('/prosesedit/{id}', 'KategoriPinjamanController@update')->name('kategoripinjaman.prosesedit');
	Route::get('/delete/{id}', 'KategoriPinjamanController@destroy')->name('kategoripinjaman.delete');
});

Route::prefix('pinjaman')->group(function(){
	Route::post('/prosestambah', 'PinjamanController@store')->name('pinjaman.prosestambah');
	Route::get('/lihat/{id}', 'PinjamanController@show')->name('pinjaman.lihat');
	Route::get('/angsuran_anggota/{id}', 'PinjamanController@angsuran_anggota')->name('pinjaman.angsuran_anggota');
	Route::get('/edit/{id}', 'PinjamanController@edit')->name('pinjaman.edit');
	Route::post('/prosesedit/{id}', 'PinjamanController@update')->name('pinjaman.prosesedit');
	Route::get('/delete/{id}', 'PinjamanController@destroy')->name('pinjaman.delete');
});

Route::prefix('detailangsuran')->group(function(){
	Route::get('/', 'DetailAngsuranController@index')->name('detailangsuran.index');
	Route::post('/prosestambah', 'DetailAngsuranController@store')->name('detailangsuran.prosestambah');
	Route::get('/lihat/{id}', 'DetailAngsuranController@show')->name('detailangsuran.lihat');
	Route::get('/delete/{id}', 'DetailAngsuranController@destroy')->name('detailangsuran.delete');
});
