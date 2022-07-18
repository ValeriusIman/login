<?php

namespace App\Http\Middleware;

use App\Frame\System\Session\UserSession;
use App\Helper\Helper;
use Closure;
use Illuminate\Http\Request;

class Authorize
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
        $helper = new Helper();
        if ($helper->isSet() === false){
            return redirect(route('/login'));
        }
        return $next($request);
    }
}
