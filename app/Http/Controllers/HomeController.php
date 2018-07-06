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
use App\Models\Order;
use DB;

class HomeController extends Controller {
  
    //Admin after login showing dashboard
   

    public function landing(){
       // $business_clients=User::where('role_id',2)->count();
       // $subscriptions_count=FIrstTimeBusinessClientSubscription::count();
        return view('homes/landing');
    }
    public function services(){
        // $business_clients=User::where('role_id',2)->count();
        // $subscriptions_count=FIrstTimeBusinessClientSubscription::count();
         return view('homes/services');
    }
    public function gallery(){
        // $business_clients=User::where('role_id',2)->count();
        // $subscriptions_count=FIrstTimeBusinessClientSubscription::count();
         return view('homes/gallery');
    }
    public function contact(){
        // $business_clients=User::where('role_id',2)->count();
        // $subscriptions_count=FIrstTimeBusinessClientSubscription::count();
        return view('homes/contact');
    }
    public function saveorder(){
        $valiationArr                           =   array();
        $formDataArr                            =   array();
        $formData                               =   Input::all();        
        if (isset($formData['formdata']) && $formData['formdata'] != '') {
            parse_str($formData['formdata'], $formDataArr);
            // echo "<pre>"; print_r($formDataArr); echo "<pre>"; exit;
            if (isset($formDataArr['Order']) && is_array($formDataArr['Order']) && count($formDataArr['Order']) > 0) {
                $validator                              =   Validator::make($formDataArr['Order'], Order::$rules, Order::$messages);
                if ($validator->fails()) {
                    $errorArr                           =   $validator->getMessageBag()->toArray();
                    if (isset($errorArr) && is_array($errorArr) && count($errorArr) > 0) {
                        foreach ($errorArr as $errorKey => $errorVal) {
                            $valiationArr[]             =   array(
                                                                'modelField'        => $errorKey,
                                                                'modelErrorMsg'     => $errorVal[0],
                                                            );
                        }
                        echo '****FAILURE****' . json_encode($valiationArr);
                        exit;
                    }
                } else {
                    DB::beginTransaction();
                    $loopCnt                            =   0;
                    $saveCnt                            =   0;
                    $name                               = trim($formDataArr['Order']['name']);
                    $email                              = trim($formDataArr['Order']['email']);
                    $mobile                              = trim($formDataArr['Order']['mobile']);
                    // $user_id                            = trim($formDataArr['Order']['user_id']);
                    $trans_from                            = trim($formDataArr['Order']['trans_from']);
                    $trans_to                            = trim($formDataArr['Order']['trans_to']);
                    $mover_date                            = date('Y-m-d',strtotime(trim($formDataArr['Order']['mover_date'])));
                   

                    $tblObjCnt                      =   DB::table('orders')
                                                            ->where('orders.name', '=', $name)
                                                            ->where('orders.email', '=', $email)
                                                            // ->where('orders.user_id', '=', $user_id)
                                                            ->where('orders.trans_from', '=', $trans_from)
                                                            ->where('orders.trans_to', '=', $trans_to)
                                                            ->where('orders.mover_date', '=', $mover_date)
                                                            ->count();
                    if ($tblObjCnt == 0) {
                        try {
                            $loopCnt++;
                            $formDatasArr['Order']['name'] = $name;
                            $formDatasArr['Order']['email'] = $email;
                            $formDatasArr['Order']['mobile'] = $mobile;
                            $formDatasArr['Order']['trans_from'] = $trans_from;
                            $formDatasArr['Order']['trans_to'] = $trans_to;
                            $formDatasArr['Order']['mover_date'] = $mover_date;
                            $formDatasArr['Order']['status'] = "A";
                            
                            DB::table('orders')->insert($formDatasArr['Order']);
                            $saveCnt++;
                        } catch (ValidationException $e) {
                            DB::rollback();
                        } catch (\Exception $e) {
                            DB::rollback();
                        }
                        
                        // echo "<pre>"; print_r($loopCnt."++".$saveCnt); echo "<pre>"; exit;
                        if ($loopCnt = $saveCnt) {
                            DB::commit();
                            echo '****SUCCESS****Order has been placed successfully.';
                        } else {
                            DB::rollback();
                            echo '****ERROR****Unable to save data.';
                        }
                    } else {
                        echo '****ERROR****This Order is already exist.';
                    }
                }
            }
        }exit;
        
    }
    

    


        

}







