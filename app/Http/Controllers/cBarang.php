<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mBarang;

class cBarang extends Controller
{
    public function __construct(){
        $this->middleware('islogin');
    }
    
    public function getAllBarang(){
        $barang = mBarang::getAllBarang();
        return view('customer/data_barang', ['barang' => $barang, 'judul' => 'Menampilkan Seluruh Barang']);
    }

    public function getBarangByName(Request $request){
        $nama = $request->cari;
        if($request->session()->has('toko')){
            $barang = mBarang::where('nama_barang', 'like', '%'.$nama.'%')->where('id_toko', $request->session()->get('toko')->id_toko)->get();
            return view('admin/data_barang', ['barang' => $barang,  'judul']);
        }
        else {
            $barang = mBarang::getBarangByName($nama);
            return view('customer/data_barang', ['barang' => $barang,  'judul' => 'Hasil Pencarian : '.$nama]);    
        }
    }

    public function getBarangByToko(Request $request){
        $barang = mBarang::where('id_toko', $request->session()->get('toko')->id_toko)->get();
        return view('admin/data_barang', ['barang' => $barang]);
    }
    public function detailBarang($id){
        $barang = mBarang::find($id);
        return view('customer/detail_barang', ['barang' => $barang]);
    }
    public function addBarang(Request $request){
        $barang = new mBarang();
        $barang->id_toko = $request->session()->get('toko')->id_toko;
        $barang->id_user = $request->session()->get('user')->id_user;
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->gambar = ('/barang/');
        $barang->deskripsi = $request->deskripsi;
        $barang->save();
        $file = $request->file('file');
        $idtoko = strval($request->session()->get('toko')->id_toko);
        $file->move(public_path('barang'), $idtoko.'_'.$barang->id_barang);
        $barang->gambar = ('/barang/'.$idtoko.'_'.$barang->id_barang);
        $barang->save();
        return \redirect('/admin/data_barang');
    }
    public function editBarang($id){
        $barang = mBarang::find($id);
        return view('admin/edit_barang', ['barang' => $barang]);
    }
    public function updateBarang($id, Request $request){
        mBarang::updateBarang($id, $request);
        return redirect('/admin/data_barang');
    }
    
    public function deleteBarang($id, Request $request){
        if($request->has('btn_delete')){
            mBarang::deleteBarang($id);
        }
        return redirect('/admin/data_barang');
    }
}
