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
// login
Route::post('register', 'logincontroller@register');
Route::post('login', 'logincontroller@login');
Route::get('user', 'logincontroller@getAuthenticatedUser')->middleware('jwt.verify');

// outfit
Route::post('/simpan_outfit','outfitcontroller@store')->middleware('jwt.verify');
Route::put('/ubah_outfit/{id}','outfitcontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_outfit/{id}','outfitcontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_outfit','outfitcontroller@tampil_outfit')->middleware('jwt.verify');

//penyewaan_model
Route::post('/simpan_penyewaan','penyewaancontroller@store')->middleware('jwt.verify');
Route::put('/ubah_penyewaan/{id}','penyewaancontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_penyewaan/{id}','penyewaancontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_penyewaan','penyewaancontroller@tampil_penyewaan')->middleware('jwt.verify');

// transaksi
Route::post('/simpan_transaksi','transaksicontroller@store')->middleware('jwt.verify');
Route::put('/ubah_transaksi/{id}','transaksicontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_transaksi/{id}','transaksicontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_transaksi/{tgl_mulai}/{tgl_selesai}','transaksicontroller@tampil_transaksi')->middleware('jwt.verify');
