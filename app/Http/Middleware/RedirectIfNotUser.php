<?php

namespace App\Http\Middleware;

use Closure;
use View;
use Session;

class RedirectIfNotUser{
    
    public function handle($request, Closure $next)
    {
        if ((Session::has('user_detail')) == false) {
            Session::flush();
            return redirect('login');
        }
        
        return $next($request);
    }
}
