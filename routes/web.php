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

// Route::get('/', 'cUser@isLogin');
Route::get('/', 'cUser@loginpage');

Route::get('/login', 'cUser@login');
// Route::post('/login','cUser@loginUser');
Route::get('/logout', 'cUser@logout');

Route::get('/form_register', function(){
    return view('register');
});
Route::post('/register', 'cRegister@register');

//Founder
Route::get('/founder/tambah_admin', function () {
    return view('founder/tambah_admin');
});

Route::get('/founder/list/{status}', 'cUser@getUserByStatus');
Route::get('/founder/list/{status}/cari', 'cUser@getUserByName');

Route::get('/founder/update/user/{id_user}', 'cUser@editUser');
Route::put('/founder/user_updating/{id_user}', 'cUser@updateUser');

Route::get('/founder/konfirm_delete_admin/{id_user}', function($id){
    return view('founder/konfirm_delete_admin', ['id' => $id]);
});
Route::get('/founder/delete/{id_user}', 'cUser@deleteUser');

Route::get('/founder/list_toko', 'cToko@getAllToko');
Route::get('/founder/list_toko/cari', 'cToko@getTokoByName');

Route::get('/founder/confirm_delete_toko/{id_toko}', function($id){
    return view('founder/konfirm_delete_toko', ['id' => $id]);
});
Route::get('/founder/delete_toko/{id_toko}', 'cToko@deleteToko');

Route::get('/founder/profil', 'cUser@profil');

//admin toko
Route::get('/admin/toko', 'cToko@getTokoByAdmin');
Route::put('/admin/toko/update', 'cToko@updateToko');
Route::put('/admin/toko/buat', 'cToko@addToko');

Route::get('/admin/tambah_barang', function(){
    return view('admin/tambah_barang');
});
Route::get('/admin/barang/tambah', 'cBarang@addBarang');
Route::post('/admin/barang/tambahBarang','cBarang@addBarangAdmin');
// Route::post('/admin/barang/tambahBarangTest','cBarang@cekAddBarang');
Route::post('/admin/barang/tambahBarangTest','cBarang@cekAddBarang');

Route::get('/admin/data_sewa', 'cSewa@getTransaksiByToko');
Route::get('/admin/cari_sewa', 'cSewa@getTransaksiByCari');
Route::get('/admin/detail_sewa/{id_transaksi}', 'cSewa@getTransaksiById');
Route::put('/admin/detail_sewa/update/{id_transaksi}', 'cSewa@updateTransaksi');
Route::get('/admin/data_sewa/konfirm_delete/{id}', function($id){
    return view('admin/delete_transaksi', ['id'=>$id]);
});
Route::put('/admin/data_sewa/delete/{id}', 'cSewa@deleteTransaksi');

Route::get('/admin/data_barang', 'cBarang@getBarangByToko');
Route::get('/admin/data_barang/cari', 'cBarang@getBarangByName');
Route::get('/admin/data_barang/form_update/{id_barang}', 'cBarang@editBarang');
Route::put('/admin/data_barang/update/{id_barang}', 'cBarang@updateBarang');
Route::get('/admin/data_barang/konfirm_delete/{id_barang}', function($id){
    return view('admin/delete_barang', ['id'=>$id]);
});
Route::put('/admin/data_barang/delete/{id_barang}', 'cBarang@deleteBarang');

Route::get('/admin/profil', 'cUser@profil');

//customer
Route::get('/customer/profil', 'cUser@profil');
Route::put('/customer/user_updating/{id_user}', 'cUser@updateUser');

Route::get('/customer/barang', 'cBarang@getAllBarang');
Route::get('/customer/cari', 'cBarang@getBarangByName');
Route::get('/customer/detail/{id_barang}', 'cBarang@detailBarang');
Route::get('/customer/sewa/{id_barang}', 'cSewa@formSewa');
Route::put('/customer/sewa_proses', 'cSewa@addTransaksi');

Route::get('/customer/transaksi', 'cSewa@getTransaksiByCustomer');
Route::get('/customer/transaksi/cari', 'cSewa@getTransaksiByCari');
Route::get('/customer/transaksi/konfirm_delete/{id}', function($id){
    return view('admin/delete_transaksi', ['id'=>$id]);
});

//sementara
Route::get('/coba', function(){
    return view('customer/data_barang');
});




//cobatweet
Route::get('/users/getTweets/{id}', ['uses' => 'UserController@getTweets', 'as' => 'users.getTweets']);
Route::resource('users', 'UserController');
Route::resource('tweet', 'TweetController');
Route::post('/tweet/store','NewTweetController@insertTweet');

// Auth::routes();

Route::get('/home', 'HomeController@index');