<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(request()->session()->get('status') == null){
            return $next($request);
        }elseif(request()->session()->get('status') == 'user'){
            return redirect('/');
        }elseif(request()->session()->get('status') == 'petugas'){
            return redirect('petugas');
        }elseif(request()->session()->get('status') == 'admin'){
            return redirect('admin');
        }
    }
}
