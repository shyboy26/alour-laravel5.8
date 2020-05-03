<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mUser;

class cUserDetail extends Controller
{
    public function getUserByStatus($status){
        $user = mUser::getUserByStatus($status);
        if($status == 'admin')
        return view('founder/list_admin', ['admin' => $user]);
        else if($status == 'customer')
        return view('founder/list_customer', ['customer' => $user]);
    }

    public function getUserByName($status, Request $request){
        $nama = $request->cari;
        $user = mUser::where('status', $status)->where('username', 'like', '%'.$nama.'%')->get();
        //return $user;
        if($status == 'admin')
        return view('founder/list_admin', ['admin' => $user]);
        else
        return view('founder/list_customer', ['customer' => $user]);
    }

    public function editUser($id){
        $user = mUser::find($id);
        if($user->status == 'admin')
        return view('founder/update_admin', ['user' => $user]);
        else
        return view('founder/update_customer', ['user' => $user]);
    }

    public function updateUser($id, Request $request){
        mUser::updateUser($id, $request);
        if($request->session()->get('user')->status == 'founder'){
            if($request->status == 'admin')
            return redirect('founder/list/admin');
            else if($request->status == 'customer')
            return redirect('founder/list/customer');
            else
            return redirect('founder/profil');
        }
        else if($request->session()->get('user')->status == 'customer'){
            return redirect('customer/profil');
        }
    }

    public function deleteUser($id){
        mUser::deleteUser($id);
        return redirect('founder/list/admin');
    }

    public function profil(Request $request){
        if($request->session()->has('user')){
            $user = $request->session()->get('user');
            if($user->status == 'founder')
            return view('founder/profil', ['user'=>$user]);
            else if($user->status =='customer')
            return view('customer/profil', ['user' => $user]);
            else if($user->status =='admin')
            return view('admin/profil', ['user' => $user]);
        }
    }
}