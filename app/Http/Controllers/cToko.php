<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mToko;

class cToko extends Controller
{
    public function getAllToko(){
        $toko = mToko::getAllToko();
        return view('founder/list_toko', ["toko" => $toko]);
    }

    public function deleteToko($id){
        mToko::deleteToko($id);
        return redirect('/founder/list_toko');
    }

    public function getTokoByAdmin(Request $request){
        $toko = mToko::getTokoByAdmin($request->session()->get('user')->id_user);
        if($toko->count() == 0)
        return view('admin/auth_toko');
        else
        return view('admin/data_toko', ['toko'=>$toko[0]]);
    }

    public function getTokoByName(Request $request){
        $nama = $request->cari;
        $toko = mToko::where('nama_toko', 'like', '%'.$nama.'%')->get();
        return view('founder/list_toko', ['toko'=>$toko]);
    }

    public function updateToko(Request $request){
        //return $request;
        mToko::updateToko($request);
        return redirect('/admin/toko');
    }

    public function addToko(Request $request){
        mToko::addToko($request->session()->get('user')->id_user, $request);
        return redirect('/admin/toko');
    }
}
