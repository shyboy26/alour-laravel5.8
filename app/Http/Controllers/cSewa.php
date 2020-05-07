<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mTransaksi;
use App\mBarang;
use App\mToko;
use App\User;
use Validator;
class cSewa extends Controller
{
    // public function __construct(){
    //     $this->middleware('islogin');
    // }
    
    public function getTransaksiByToko(Request $request){
        
        $user = $request->session()->get('user');
        $toko = mToko::where('id_user', $user->id_user)->first();
        //return $toko;
        if($toko == null) return view('admin/auth_toko');
        $request->session()->put('toko', $toko);
        $transaksi = mTransaksi::where('id_toko', $toko->id_toko)->get();
        foreach($transaksi as $t){
            $t->user = User::where('id_user', $t->id_user)->first();
        }
        //return $transaksi;
        return view('admin/data_sewa', ['transaksi' => $transaksi]);
    }

    public function getTransaksiByCustomer(Request $request){
        $user = $request->session()->get('user');
        $transaksi = mTransaksi::getTransaksiByCustomer($user->id_user);
        return view('customer/transaksi', ['transaksi' => $transaksi]);
    }

    public function getTransaksiByCari(Request $request){
        $user = $request->session()->get('user');
        $cari = $request->cari;
        
        if($user->status == 'admin'){
            $id_toko = $request->session()->get('toko')->id_toko;
            $transaksi = mTransaksi::where('nama_barang', 'like', '%'.$cari.'%')->where('transaksi.id_toko', $id_toko)->leftJoin('barang', 'transaksi.id_barang', '=', 'barang.id_barang')->get();
            return view('admin/data_sewa', ['transaksi' => $transaksi]);
        } else if($user->status == 'customer'){
            $transaksi = mTransaksi::where('nama_barang', 'like', '%'.$cari.'%')->where('transaksi.id_user', $user->id_user)->leftJoin('barang', 'transaksi.id_barang', '=', 'barang.id_barang')->get();
            return view('customer/transaksi', ['transaksi' => $transaksi]);
        }
    }

    public function getTransaksiById($id){
        $transaksi = mTransaksi::getTransaksiById($id);
        return view('admin/detail_sewa', ['transaksi' => $transaksi]);
    }

    public function formSewa($id_barang){
        $barang = mBarang::getBarangById($id_barang);
        return view('customer/sewa_barang', ['barang' => $barang]);
    }

    public function addTransaksi(Request $request){
        mTransaksi::addTransaksi($request);
        return redirect('/customer/transaksi');
    }

    public function addTransaksiTest(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'tgl_digunakan' => 'required',
            'tgl_kembali' => 'required',
            'durasi_sewa' => 'required',
            'jumlah_barang' =>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        else{
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

       
    }

    public function updateTransaksi($id, Request $request){
        $success = mTransaksi::updateTransaksi($id, $request);
        /*if($success){
            echo '  <script type="text/javascript">
            alert("Data transaksi SUKSES Diperbarui"); 
            window.location = "index.php";
            </script>';
        } else {
            echo '  <script type="text/javascript">
            alert("Data transaksi Gagal Diperbarui");
            </script>';
        }*/
        return redirect('/admin/data_sewa');
    }

    public function deleteTransaksi($id, Request $request){
        if($request->has('btn_delete_transaksi')){
            mTransaksi::deleteTransaksi($id, $request);
        }
        if($request->session()->has('toko'))
        return redirect('/admin/data_sewa');
        else
        return redirect('/customer/transaksi');
    }
}
