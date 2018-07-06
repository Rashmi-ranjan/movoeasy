<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
class AdminMiddleware
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
        $isAdmin = false;
        
        if($role_id['role_id'] == 1 || $role_id['role_id'] == 2 || $role_id['role_id'] == 3 || $role_id['role_id'] == 4 || $role_id['role_id'] == 5 || $role_id['role_id'] == 6 || $role_id['role_id'] == 7 || $role_id['role_id'] == 8 || $role_id['role_id'] == 9 || $role_id['role_id'] == 10 || $role_id['role_id'] ==11 || $role_id['role_id'] == 12 || $role_id['role_id'] == 13 || $role_id['role_id'] == 99){
            $isAdmin = true;
        }else{
            return redirect()->to('/');
        }

    // snippet ci-dessous selon doc de Laravel
    if( !$isAdmin )
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
