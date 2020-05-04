<?php

namespace App\Http\Middleware;

use Closure;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('user')){
            $user = $request->session()->get('user');
            if($user->status == 'founder')
            return redirect('/founder/list/admin');
            else if($user->status == 'customer')
            return redirect('/customer/barang');
            else if($user->status == 'admin')
            return redirect('/admin/data_sewa');
        } else{
            $request->session()->flush();
            return redirect('/');
        }
        // return $next($request);
    }
}
