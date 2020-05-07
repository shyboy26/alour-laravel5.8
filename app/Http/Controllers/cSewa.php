<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mTransaksi;
use App\mBarang;
use App\mToko;
use Validator;
class cSewa extends Controller
{
    // public function __construct(){
    //     $this->middleware('islogin');
    // }
    public function cekStatus(Request $request)
    {
        if($request->session()->has('user')){
            if($request->session()->get('user')->status == "admin"){
                return $this->getTransaksiByToko($request);
            }else{
                return redirect('/');
            }
        }
    }
    public function getTransaksiByToko(Request $request){
        
        $user = $request->session()->get('user');
        $toko = mToko::where('id_user', $user->id_user)->first();
        //return $toko;
        if($toko == null) return view('admin/auth_toko');
        $request->session()->put('toko', $toko);
        $transaksi = mTransaksi::where('id_toko', $toko->id_toko)->get();
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

   
    public function addTransaksiPost(Request $req)
    {
        
            $barang = mBarang::find($req->id_barang);

                if($barang->stok >= $req->jumlah){
                    $barang->stok -= $req->jumlah;
                    
                    $barang->save();
                    if($barang){
                        $data = array(
                            'id_toko'=>$barang['id_toko'],
                            'id_user' => $req->id_user,
                            'id_barang' => 21,
                            'harga' => $barang['harga'],
                            'tgl_digunakan' => $req->tgl_digunakan,
                            'tgl_kembali' => $req->tgl_kembali,
                            'durasi' => 8,
                            'jumlah' => 2,
                        );
                        // dd($data);
                        return $this->addTransaksiUpdate($data);
                    }else{
                        return response()->json("Transaksi gagal", 401);
                    }
                }else{
                    return response()->json("Transaksi gagal", 401);
                }
            
        
       

        
    }

    public function addTransaksiUpdate($data)
    {
                $transaksi = new mTransaksi();
                // dd($data['id_user']);
                // dd($barang->id_toko);
                $transaksi->id_toko = $data['id_toko'];
                $transaksi->id_user = $data['id_user'];
                $transaksi->id_barang = $data['id_barang'];
                $transaksi->tgl_transaksi = date('Y-m-d');
                $transaksi->tgl_digunakan = $data['tgl_digunakan'];
                $transaksi->tgl_kembali = $data['tgl_kembali'];
                $transaksi->durasi_sewa = $data['durasi'];
                $transaksi->total_harga = $data['harga'];
                $transaksi->jumlah_barang = $data['jumlah'];
                $transaksi->status_transaksi = 'dipesan';
                $transaksi->save();
                // return response()->json("Sukses", 200);
                return  redirect('/customer/transaksi');
    }

    public function addTransaksi(){
        // mTransaksi::addTransaksi($request);
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
