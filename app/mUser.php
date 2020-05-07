<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'username', 'password', 'email', 'no_hp', 'status'
    ];
    // public $primaryKey = 'id_user';
    public $timestamps = false;
    
    public function toko(){
        return $this->hasOne('App\mToko');
    }

    public function transaksi(){
        return $this->hasMany('App\mTransaksi');
    }

    public static function addUser($request){ 
        $buat = mUser::create([
    		'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status' => $request->status
    	]);
    }

    public static function updateUser($id, $req){
        $user = mUser::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->email = $req->email;
        $user->no_hp = $req->nomer_hp;
        $user->status = $req->status;
        $user->save();
    }

    public static function getUserByStatus($status){
        $user = mUser::where('status', $status)->get();
        return $user;
    }

    public static function getUserById($id){
        $user = mUser::find($id);
        return $user;
    }

    public static function deleteUser($id){
        $user = mUser::find($id);
        $user->delete();
    }
}
