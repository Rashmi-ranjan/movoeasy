<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
class HomeMiddleware
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
        $role_id=Auth::user();
        $isHome = false;
        
        if($role_id['role_id'] == 2){
            $isHome = true;
        }else{
            return redirect()->to('/');
        }

    // snippet ci-dessous selon doc de Laravel
    if( !$isHome )
    {
        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->to('/')->with('message','Sorry, You Are Unauthorized Person to access...'); //todo h peut-etre une fenetre modale pour dire acces refusé ici...
        }
    }
    return $next($request);
    }
}
