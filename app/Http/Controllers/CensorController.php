<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\FIrstTimeBusinessClientSubscription;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class CensorController extends Controller {
  
    //Admin after login showing dashboard
   

    public function dashboard(){
       // $business_clients=User::where('role_id',2)->count();
       // $subscriptions_count=FIrstTimeBusinessClientSubscription::count();
        return view('censors/dashboard');
    }


        

}







