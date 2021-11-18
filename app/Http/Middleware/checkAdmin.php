<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdmin
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
        if(request()->session()->get('status') == 'admin'){
            return $next($request);
        }elseif($request->session()->get('status') == ''){
            return redirect('admin/login');
        }else{
            abort(401);
        }
    }
}
