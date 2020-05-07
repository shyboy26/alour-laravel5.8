<?php

namespace App;

use App\Tweet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $rememberTokenName = false;
    protected $primaryKey = 'id_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {
        return $this->hasMany('App\Tweet');
    }

    // public function follows()
    // {
    //     return $this->belongsToMany('App\User', 'user_follows', 'user_id', 'follow_id');
    // }

    // public function followers()
    // {
    //     return $this->belongsToMany('App\User', 'user_follows', 'follow_id', 'user_id');
    // }

    public function createTweet($tweet)
    {
        $newTweet = Tweet::create([
            'tweet' => $tweet,
            'user_id' => $this->id
        ]);
        
        // $newTweet->save();
        // dd($newTweet);
        return $newTweet;
    }

    // public function follow($followedUser)
    // {
    //     $this->follows()->attach($followedUser);

    //     return $this;
    // }

    public function getTweets()
    {
        return Tweet::where('user_id', $this->id)->get();
    }

    // public function countTweets()
    // {
    //     return Tweet::where('user_id', $this->id)->count();
    // }

    public static function addUser($request){ 
        $buat = User::create([
    		'name' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status' => $request->status
    	]);
    }

    public static function updateUser($id, $req){
        $user = User::find($id);
        $user->name = $req->username;
        $user->password = $req->password;
        $user->email = $req->email;
        // $user->no_hp = $req->nomer_hp;
        $user->status = $req->status;
        $user->save();
    }

    public static function getUserByStatus($status){
        $user = User::where('status', $status)->get();
        return $user;
    }

    public static function getUserById($id){
        $user = User::find($id);
        return $user;
    }
}
