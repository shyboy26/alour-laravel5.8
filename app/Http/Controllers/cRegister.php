<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mUser;

class cRegister extends Controller
{
    public function __construct(){
        $this->middleware('islogin');
    }
    
    public function register(Request $request){
        if($request->password == $request->password2){
            mUser::addUser($request);
        }
        else{
            echo '<script type="text/javascript">
					alert("Password Confirm Tidak Sesuai");
					window.history.back();
					</script>';
        }
        if($request->session()->has('user')){
            return view('founder/tambah_admin');
        }
        else {
            return view('index');
        }
    }
}
