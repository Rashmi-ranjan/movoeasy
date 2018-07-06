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
use DB;

class OrderController extends Controller {
  
    //Admin after login showing dashboard
    public function  orderList(){
        $orderListArr       =   [];
        $orderListCnt       =   0;
        $layoutArr          =   [];
        $pageTitle          =   'Order List';
        $orderListArr       =    DB::table('orders')->get();
        $orderListCnt       =    DB::table('orders')->count();
        $layoutArr          =   [
                                    'pageTitle'     =>  $pageTitle, 
                                    'orderListArr'  =>  $orderListArr,
                                    'orderListCnt'  =>  $orderListCnt                       
                                ];
        return view('order/order-list',['layoutArr' => $layoutArr]);
    }


        

}







