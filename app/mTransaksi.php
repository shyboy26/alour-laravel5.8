<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mTransaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_toko', 'id_user', 'id_barang', 'tgl_transaksi', 'tgl_digunakan', 'tgl_kembali',
        'durasi_sewa', 'jumlah_barang', 'total_harga', 'status_transaksi'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\mUser', 'id_user');
    }
    public function toko(){
        return $this->belongsTo('App\mToko', 'id_toko');
    }
    public function barang(){
        return $this->belongsTo('App\mBarang', 'id_barang');
    }

    public static function getTransaksiByCustomer($id){
        $transaksi = mTransaksi::where('id_user', $id)->get();
        return $transaksi;
    }

    public static function getTransaksiById($id){
        $transaksi = mTransaksi::find($id);
        return $transaksi;
    }

    public static function addTransaksi($req){
        $barang = mBarang::find($req->id_barang);
        if($barang->stok >= $req->jumlah){
            $barang->stok -= $req->jumlah;
            $barang->save();
        } else {
            return 'transaksi gagal, stok barang tidak tersedia';
        }
        mTransaksi::create([
            'id_toko' => $barang->toko->id_toko,
            $user = $req->session()->get('user'),
            'id_user' => $user->id_user,
            'id_barang' => $req->id_barang,
            'tgl_transaksi' => date('Y-m-d'),
            'tgl_digunakan' => $req->tgl_digunakan,
            'tgl_kembali' => $req->tgl_kembali,
            'durasi_sewa' => $req->durasi,
            'jumlah_barang' =>$req->jumlah,
            'total_harga' => $barang->harga * $req->jumlah,
            'status_transaksi' => 'dipesan'
        ]);
    }

    public static function addTransaksiTest($req){
        if($req->stok >= $req->jumlah){
            $req->stok -= $req->jumlah;
            return response()->json([
                "Status" => "transaksi berhasil"
            ], 200);
        } else {
            return response()->json([
                "Status" => "transaksi gagal, stok barang tidak tersedia"
            ], 401);
        }
    }

    public static function updateTransaksi($id, $req){
        $transaksi = mTransaksi::find($id);
        $transaksi->status_transaksi = $req->status_baru;
        $transaksi->save();
    }

    public static function deleteTransaksi($id, $req){
        $transaksi = mTransaksi::find($id);
        $transaksi->delete();
    }
}
