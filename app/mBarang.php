<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mBarang extends Model
{
    protected $table = 'barang';
    public $primaryKey = 'id_barang';
    public $fillable = ['id_toko', 'id_user', 'nama_barang', 'stok', 'harga', 'gambar', 'deskripsi'];
    public $timestamps = false;

    public function toko(){
        return $this->belongsTo('App\mToko', 'id_toko');
    }
    public function transaksi(){
        return $this->hasMany('App\mTransaksi');
    }
    public static function getAllBarang(){
        $barang = mBarang::all();
        return $barang;
    }

    public static function getBarangByName($nama){
        $barang = mBarang::where('nama_barang', 'like', '%'.$nama.'%')->get();
        return $barang;
    }

    public static function getBarangById($id){
        $barang = mBarang::find($id);
        return $barang;
    }

    public static function addBarang($req){
        $barang = new mBarang();
        $barang->id_toko = $req->session()->get('toko')->id_toko;
        $barang->id_user = $req->session()->get('user')->id_user;
        $barang->nama_barang = $req->nama_barang;
        $barang->stok = $req->stok;
        $barang->harga = $req->harga;
        $barang->gambar = ('/barang/');
        $barang->deskripsi = $req->deskripsi;
        $barang->save();
        $id = $barang->id;
        $file = $req->file;
        $nama_file = strval($req->session()->get('toko')->id_toko).strval($id);
        $file->move('C:\xampp\htdocs\alour-laravel5.8\public\barang', $nama_file);
        $barang->gambar = ('/barang/'.$nama_file.strval($file->getClientOriginalExtension));
        $barang->save();
    }

    public static function updateBarang($id, $req){
        $barang = mBarang::find($id);
        $barang->nama_barang = $req->nama_barang;
        $barang->stok = $req->stok;
        $barang->harga = $req->harga;
        $barang->deskripsi = $req->deskripsi;
        $barang->save();
    }

    public static function deleteBarang($id){
        $barang = mBarang::find($id);
        $barang->delete();
    }
}
