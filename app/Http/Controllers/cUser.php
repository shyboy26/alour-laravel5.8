<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mUser;
use App\User;

class cUser extends Controller
{
    // public function __construct(){
    //     $this->middleware('islogin',['except' => 'loginpage']);
    // }

    public function loginpage(){
        return view('index');
    }

    public function isLogin(Request $request){
        if($request->session()->has('user')){
            $user = $request->session()->get('user');
            if($user->status == 'founder')
            return redirect('/founder/list/admin');
            else if($user->status == 'customer')
            return redirect('/customer/barang');
            else if($user->status == 'admin')
            return redirect('/admin/data_sewa');
        } else{
            return view('index');
        }
    }

    public function loginUser(Request $request)
    {
        $user = User::where('email', $request->email)->where('password', $request->password)->get();
        dd($user);
        if($user->count() == 1){
            $request->session()->put('user', $user[0]);
        } else {
            echo "<script type='text/javascript'>alert('Username atau Password salah');</script>";
            return view('index');
        }
        if($user[0]->status == 'founder')
        return redirect('/founder/list/admin');
        else if($user[0]->status == 'customer')
        return redirect('/customer/barang');
        else if($user[0]->status == 'admin')
        return redirect('/admin/data_sewa');
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        // dd($user);
        if($user){
            $request->session()->put('user', $user);
            if($user['status'] == 'founder'){
                return redirect('/founder/list/admin');
            }
            else if($user['status'] == 'customer'){
                return redirect('/customer/barang');
            }
            else if($user['status'] == 'admin'){
                return redirect('/admin/data_sewa');
            }
        } else {
            echo "<script type='text/javascript'>alert('Username atau Password salah');</script>";
            return view('index');
        }
        
        
       
    }

    public function logindua(Request $request)
    {
        
        
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

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
