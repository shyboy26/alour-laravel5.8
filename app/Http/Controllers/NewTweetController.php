<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class NewTweetController extends Controller
{
    //

    public function insertTweet(Request $request)
    {
         //
        $resp = Auth::user()->createTweet($request->tweet);
        dd($request);
        return $resp;
        // return redirect()->route('tweet.create')->with(['status' => 'success', 'message' => 'Create tweet success!']);
    
    }
}
