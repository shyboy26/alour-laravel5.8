<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mToko extends Model
{
    protected $table = 'toko';
    public $primaryKey = 'id_toko';
    protected $fillable = [
        'id_user', 'nama_toko', 'alamat', 'lokasi_maps', 'kategori'
    ];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\mUser', 'id_user');
    }

    public function transaksi(){
        return $this->hasMany('App\mTransaksi');
    }
    
    public static function getAllToko(){
        $toko = mToko::all();
        return $toko;
    }

    public static function deleteToko($id){
        $toko = mToko::find($id);
        $toko->delete();
    }

    public static function getTokoByAdmin($id){
        $toko = mToko::where('id_user', $id)->get();
        return $toko;
    }

    public static function updateToko($req){
        $toko = mToko::find($req->id_toko);
        $toko->nama_toko = $req->nama_toko;
        $toko->alamat = $req->alamat;
        //$toko->lokasi_maps = $req->maps;
        $toko->kategori = $req->kategori;
        $toko->save();
    }

    public static function addToko($id, $req){
        mToko::create([
            'id_user' => $id,
            'nama_toko' => $req->nama_toko,
            'alamat' => $req->alamat,
            'lokasi_maps' => $req->lokasi_maps,
            'kategori' => $req->kategori
        ]);
    }
}
