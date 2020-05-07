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

// Route::post('/admin/barang/tambahBarang','cBarang@addBarangAdmin');


//Testing
Route::post('/admin/barang/tambahBarangTest','cBarang@cekAddBarang');

Route::post('/tweet/store','NewTweetController@insertTweet');
Route::post('/customer/sewa','cSewa@addTransaksiTest');
Route::post('/customer/sewa/tambah','cSewa@addTransaksiPost');
// Route::get('/login', 'cUser@login');
// Route::get('/', 'cUser@loginpage');