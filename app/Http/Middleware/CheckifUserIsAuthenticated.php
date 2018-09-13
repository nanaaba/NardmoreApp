<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckifUserIsAuthenticated {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {


        if ($this->checkifuserisauthentcated()) {
            return $next($request);
        }

        return redirect('/');
    }

    public function checkifuserisauthentcated() {
        if (\Session::has('username')) {
            return true;
        } else {
            return false;
        }
    }

}
