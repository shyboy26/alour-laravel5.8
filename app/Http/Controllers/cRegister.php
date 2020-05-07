<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class cRegister extends Controller
{
    // public function __construct(){
    //     $this->middleware('islogin');
    // }
    
    public function register(Request $request){
        if($request->password == $request->password2){
            // dd($request);
            User::addUser($request);
        }
        else{
            echo '<script type="text/javascript">alert("Password Confirm Tidak Sesuai");</script>';
            return view('index');
        }
        if($request->session()->has('user')){
            return view('founder/tambah_admin');
        }
        else {
            return redirect('/');
        }
    }
}
