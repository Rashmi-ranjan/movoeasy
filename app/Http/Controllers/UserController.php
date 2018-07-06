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
use Hash;
use Mail;

class UserController extends Controller {
    public function userLogin(){
      //return bcrypt('123456');
        return view('users.user-login');
    }
    public function adminLogin(){
        //return bcrypt('123456');
        $companyname             	= 	Controller::getCompanyname(1);
        return view('users.admin-login',['companyname' => $companyname]);
    }

    //Admin after login showing dashboard
    public function signup(Request $request){
        $userObj										=   DB::table('users')
                                                                ->where('users.email','=',Input::get('email'))
                                                                ->select('users.is_active','users.is_reset_req','users.expired_date','users.id')
                                                                ->first();
        //$sunday_confg								=   Config::get('sundayschool');

        if(is_object($userObj)){
            if(isset($userObj->is_active) && $userObj->is_active == 'Y'){
                if(isset($userObj->is_reset_req) && $userObj->is_reset_req == 'N'){
                    if(isset($userObj->expired_date)){
                        if($userObj->expired_date == '0000-00-00'){
                            if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
                                return Redirect::to('censor/dashboard');									
                            } else {
                                return Redirect::to('/admin')
                                    ->with('error', 'username/password combination was incorrect')
                                    ->withInput();
                            }
                        }else{
                            $currentDat						=	date('Y-m-d');
                            $currentTime					=	strtotime($currentDat);
                            $expiredTime					=	strtotime($userObj->expired_date);//echo $expiredTime.'++'.$currentTime;exit;
                            if($expiredTime >= $currentTime){
                                if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
                                    DB::table('users')
                                        ->where('id',$userObj->id)
                                        ->update(array('users.expired_date'=>'0000-00-00'));
                                        return Redirect::to('censor/dashboard');
                                    	
                                } else {
                                    return Redirect::to('/admin')
                                        ->with('error', 'username/password combination was incorrect.')
                                        ->withInput();
                                }
                            }else{
                                return Redirect::to('/admin')
                                        ->with('error', 'Your account is expired.')
                                        ->withInput();
                            }							
                        }
                    }
                }else{
                    return Redirect::to('/admin')
                            ->with('error','Your have reset your password.Check your mail for password reset link.')
                            ->withInput();
                }					
            }else if(isset($userObj->is_active) && $userObj->is_active == 'P'){
                return Redirect::to('/admin')
                    ->with('error','Your account is Pending.')
                    ->withInput();
            }else{
                return Redirect::to('/admin')
                    ->with('error','Your account is inactive.')
                    ->withInput();
            }
        }else{
            return Redirect::to('/admin')
                ->with('error', 'Invalid login.')
                ->withInput();
        }  

    }
    
    public function userSignup(Request $request){
        //echo "<pre>"; print_r(Input::get('email')); echo "<pre>"; exit;
        $userObj										=   DB::table('users')
                                                                ->where('users.email','=',Input::get('email'))
                                                                ->select('users.is_active','users.is_reset_req','users.expired_date','users.id')
                                                                ->first();
        //$sunday_confg								=   Config::get('sundayschool');

        if(is_object($userObj)){
            if(isset($userObj->is_active) && $userObj->is_active == 'Y'){
                if(isset($userObj->is_reset_req) && $userObj->is_reset_req == 'N'){
                    if(isset($userObj->expired_date)){
                        if($userObj->expired_date == '0000-00-00'){
                            if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
                                return Redirect::to('/');									
                            } else {
                                return Redirect::to('/user-login')
                                    ->with('error', 'username/password combination was incorrect')
                                    ->withInput();
                            }
                        }else{
                            $currentDat						=	date('Y-m-d');
                            $currentTime					=	strtotime($currentDat);
                            $expiredTime					=	strtotime($userObj->expired_date);//echo $expiredTime.'++'.$currentTime;exit;
                            if($expiredTime >= $currentTime){
                                if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
                                    DB::table('users')
                                        ->where('id',$userObj->id)
                                        ->update(array('users.expired_date'=>'0000-00-00'));
                                        return Redirect::to('/');
                                    	
                                } else {
                                    return Redirect::to('/user-login')
                                        ->with('error', 'username/password combination was incorrect.')
                                        ->withInput();
                                }
                            }else{
                                return Redirect::to('/user-login')
                                        ->with('error', 'Your account is expired.')
                                        ->withInput();
                            }							
                        }
                    }
                }else{
                    return Redirect::to('/user-login')
                            ->with('error','Your have reset your password.Check your mail for password reset link.')
                            ->withInput();
                }					
            }else if(isset($userObj->is_active) && $userObj->is_active == 'P'){
                return Redirect::to('/user-login')
                    ->with('error','Your account is Pending.')
                    ->withInput();
            }else{
                return Redirect::to('/user-login')
                    ->with('error','Your account is inactive.')
                    ->withInput();
            }
        }else{
            return Redirect::to('/user-login')
                ->with('error', 'Invalid login.')
                ->withInput();
        }  

    }
    public function userRegister(){
        return view('users.user-register');
    }
    public function savecreateuser() {
        $valiationArr = array();
        $formData = Input::all();
        $formDataArr = array();
        if (isset($formData['formdata']) && $formData['formdata'] != '') {
            parse_str($formData['formdata'], $formDataArr);
            // echo "<pre>"; print_r($formDataArr); echo "<pre>"; exit;
            if (isset($formDataArr['User']) && is_array($formDataArr['User']) && count($formDataArr['User']) > 0) {
                $validator = Validator::make($formDataArr['User'], User::$rules['PackerSignup'], User::$messages);
                if ($validator->fails()) {
                    $errorArr = $validator->getMessageBag()->toArray();
                    if (isset($errorArr) && is_array($errorArr) && count($errorArr) > 0) {
                        foreach ($errorArr as $errorKey => $errorVal) {
                            $valiationArr[] = array(
                                'modelField' => $errorKey,
                                'modelErrorMsg' => $errorVal[0],
                            );
                        }
                        echo '****FAILURE****' . json_encode($valiationArr);
                        exit;
                    }
                } else {
                    DB::beginTransaction();
                    $loopCnt                =   0;
                    $saveCnt                =   0;
                    $organisation_id        =   1;
                    $status                 =   'P';
                    $role_id                =   2;
                    
                    $fullname               =   trim($formDataArr['User']['fullname']);
                    $email                  =   trim($formDataArr['User']['email']);
                    $packer_name            =   trim($formDataArr['User']['packer_name']);
                    $mobile                 =   trim($formDataArr['User']['mobile']);
                    $tblObjCnt              =   DB::table('users')
                                                    ->where('users.fullname', '=', $fullname)
                                                    ->where('users.email', '=', $email)
                                                    ->where('users.packer_name', '=', $packer_name)
                                                    ->where('users.mobile', '=', $mobile)
                                                    ->count();
                    if ($tblObjCnt == 0) {
                        try {
                            $loopCnt++;
                            $formUserDataArr['User']['role_id'] = $role_id;
                            $formUserDataArr['User']['organisation_id'] = $organisation_id;
                            $formUserDataArr['User']['packer_name'] = $formDataArr['User']['packer_name'];
                            $formUserDataArr['User']['fullname'] = $formDataArr['User']['fullname'];
                            $formUserDataArr['User']['email'] = $formDataArr['User']['email'];
                            $formUserDataArr['User']['mobile'] = $formDataArr['User']['mobile'];
                            $formUserDataArr['User']['is_reset_req'] = "N";
                            $formUserDataArr['User']['expired_date'] = "0000-00-00";
                            $formUserDataArr['User']['is_active'] = $status;
                            $formUserDataArr['User']['remember_token'] = $formDataArr['_token'];
                            $formUserDataArr['User']['password'] = Hash::make($formDataArr['User']['password']);
                            $formUserDataArr['User']['re_password'] = $formDataArr['User']['re_password'];
                            $formUserDataArr['User']['created_at'] = date('Y-m-d h:i:s');
                            $formUserDataArr['User']['updated_at'] = date('Y-m-d h:i:s');
                            DB::table('users')->insert($formUserDataArr['User']);
                            $saveCnt++;
                        } catch (ValidationException $e) {
                            DB::rollback();
                        } catch (\Exception $e) {
                            DB::rollback();
                        }
                        
                        // echo "<pre>"; print_r($loopCnt."++".$saveCnt); echo "<pre>";exit; 
                        //echo "<pre>"; print_r($user_id); echo "<pre>"; exit;
                        if ($loopCnt = $saveCnt) {
                            DB::commit();
                            echo '****SUCCESS****Your Account has been Created successfully.';
                        } else {
                            DB::rollback();
                            echo '****ERROR****Unable to save data.';
                        }
                    } else {
                        echo '****ERROR****This User is already exist.';
                    }
                }
            }
        }exit;
        
    }
    public function lostPassword(){
        $companyname             	= 	Controller::getCompanyname(1);
        return view('users.lost-password',['companyname' => $companyname]);
    }
    public function validatelostpswdmail(){
        $valiationArr									=   array();
        //if(isset(Auth::user()->id) && Auth::user()->id){
            $formData									=   Input::all();				
            $formDataArr								=   array();
            $username									=	'';
            if(isset($formData['formdata']) && $formData['formdata'] != ''){ 
                parse_str($formData['formdata'],$formDataArr);	
                //echo "<pre>"; print_r($formDataArr); echo "<pre>"; exit;				
                if(isset($formDataArr['User']) && is_array($formDataArr['User']) && count($formDataArr['User']) > 0){
                    $validator							=   Validator::make($formDataArr['User'],User::$rules['lostpasswordemail']);										
                    if ($validator->fails()){
                        $errorArr   =   $validator->getMessageBag()->toArray();
                        if(isset($errorArr) && is_array($errorArr) && count($errorArr) > 0){
                            foreach($errorArr as $errorKey=>$errorVal){
                                $valiationArr[]     	=   array(
                                                                'modelField'            =>  $errorKey,
                                                                'modelErrorMsg'         =>  $errorVal[0],
                                                            );
                            }
                        }
                    }else{
                        if(isset($formDataArr['User']['email_forgot']) && $formDataArr['User']['email_forgot'] != ''){
                            $userArr						=   DB::table('users')
                                                                    ->where('users.email','=',$formDataArr['User']['email_forgot'])
                                                                    ->select(array('users.id'))
                                                                    ->first();
                            if(!is_object($userArr)){
                                $valiationArr[]				=	array(
                                                                    'modelField'            =>  'email_forgot',
                                                                    'modelErrorMsg'         =>  'This email does not exist.',
                                                                );
                            }					
                        }
                    }	
                    //echo "<pre>"; print_r($valiationArr); echo "</pre>"; exit;
                    if(is_array($valiationArr) && count($valiationArr) > 0){
                        echo '****FAILURE****'.json_encode($valiationArr);  exit;
                    }else{
                        DB::beginTransaction();	
                        $loopCnt    =   0;
                        $saveCnt    =   0;					
                        if(isset($userArr->id) && $userArr->id != 0){
                            $userObj									=   DB::table('users')
                                                                                //->where('users.is_reset_req','=','N')
                                                                                ->where('users.email','=',$formDataArr['User']['email_forgot'])	
                                                                                ->first();
                            if(is_object($userObj)){
                                $username						=	$userObj->fullname;
                            }
                            global $to;
                            $to												=	$formDataArr['User']['email_forgot'];
                            $formDataArr['user']['updated_at']				=	date('Y-m-d h:i:s');
                            $formDataArr['user']['remember_token']			=	csrf_token();
                            $formDataArr['user']['is_reset_req']			=	'Y';
                            try {
                                DB::table('users')
                                    ->where('id',$userArr->id)
                                    ->update($formDataArr['user']);
                               	
                                //$message      = $call_recording_url;
                                $data										=   array(
                                                                                    'csrf_token'				=>  csrf_token(),
                                                                                    'id'						=>  $userArr->id,
                                                                                    'email'					    => $to,
                                                                                    "subject"                   => "Forgot Password Email",
                                                                                    "username"                  =>  $username
                                                                                );
                                $loopCnt++;
                                $mail_sent=Mail::send('emails.resetpassword', $data, function($message) use ($data){
                                    $message->to($data['email'], 'Receiver')
                                            ->subject($data['subject']);      
                                });
                                $saveCnt++;
                                
                            } catch(ValidationException $e){
                                DB::rollback();
                                echo '****ERROR****Unable to sent email.'; exit;
                            } catch(\Exception $e){
                                DB::rollback();
                                throw $e;
                                echo '****ERROR****Unable to sent email.'; exit;
                            }
                        }
                        if($loopCnt == $saveCnt){
                            DB::commit();
                            echo '****SUCCESS****Reset password sent successfully. Please Check your Mail'; exit;
                        }else{
                            DB::rollback();
                            echo '****ERROR****Unable to save data.';
                        }
                    }
                }
            }else{
                echo '****ERROR****Invalid form submission.';	exit;
            }			
        // }else{
        // 	echo '****ERROR****Please login to register.';
        // }exit;
    }
    public function resetpassword($token = '',$id = 0){
        $companyname             	= 	Controller::getCompanyname(1);
        $username 										=	'';
        $error											=	'';
        if($token != '' && (int)$id != 0){
            $userCnt									=   DB::table('users')
                                                                ->where('users.id','=',(int)$id)
                                                                ->where('users.is_reset_req','=','Y')
                                                                ->where('users.remember_token','=',$token)																	
                                                                ->count();
            if($userCnt == 0){
                $error									=	'This link is invalid.';
            }
        }	
        $layoutArr										=	array(
                                                                'token'		=>	$token,
                                                                'id'		=>	$id,
                                                                'error'		=>	$error,
                                                                'username'	=>	$username,
                                                            );
        return view('users.reset-password',['layoutArr' => $layoutArr,'companyname' => $companyname]);
    
    }
    public function resetnewpassword(){
        $valiationArr									=   array();
        $formData										=   Input::all();				
        $formDataArr									=   array();
        
        if(isset($formData['formdata']) && $formData['formdata'] != ''){ 
            parse_str($formData['formdata'],$formDataArr);				
            if(isset($formDataArr['User']) && is_array($formDataArr['User']) && count($formDataArr['User']) > 0){
                $validator								=   Validator::make($formDataArr['User'],User::$rules['resetpassword'],User::$messages);										
                if ($validator->fails()){
                    $errorArr   =   $validator->getMessageBag()->toArray();
                    if(isset($errorArr) && is_array($errorArr) && count($errorArr) > 0){
                        foreach($errorArr as $errorKey=>$errorVal){
                            $valiationArr[]				=   array(
                                                                'modelField'            =>  $errorKey,
                                                                'modelErrorMsg'         =>  $errorVal[0],
                                                            );
                        }
                    }
                }else{
                    if(isset($formDataArr['User']['id']) && $formDataArr['User']['id'] != ''){
                        $userCnt						=   DB::table('users')
                                                                ->where('users.id','=',$formDataArr['User']['id'])
                                                                ->where('users.is_reset_req','=','Y')
                                                                ->where('users.remember_token','=',$formDataArr['User']['token'])																	
                                                                ->count();
                        if($userCnt == 0){
                            echo '****ERROR****This link is invalid';
                        }					
                    }
                }					
                if(is_array($valiationArr) && count($valiationArr) > 0){
                    echo '****FAILURE****'.json_encode($valiationArr);  
                }else{
                    DB::beginTransaction();
                    $loopCnt    =   0;
                    $saveCnt    =   0;						
                    if(isset($userCnt) && $userCnt != 0){
                        $formDataArr['user']['password']				=	Hash::make($formDataArr['User']['new_password']);
                        $formDataArr['user']['updated_at']				=	date('Y-m-d h:i:s');
                        $formDataArr['user']['remember_token']			=	'';
                        $formDataArr['user']['is_reset_req']			=	'N';							
                        try {
                            $loopCnt++;
                            DB::table('users')
                                ->where('id',$formDataArr['User']['id'])
                                ->update($formDataArr['user']);
                            $saveCnt++;
                            
                        } catch(ValidationException $e){
                            
                        } catch(\Exception $e){
                            DB::rollback();
                            echo '****ERROR****Unable to reset password.';
                        }
                    }
                    // echo "<pre>"; print_r($loopCnt."++".$saveCnt); echo "<pre>"; exit;
                    if($loopCnt == $saveCnt){
                        DB::commit();
                        echo '****SUCCESS****Password reset successfully.';
                    }else{
                        DB::rollback();
                        echo '****ERROR****Unable to reset password.';
                    }
                }
            }
        }else{
            echo '****ERROR****Invalid form submission.';	
        }exit;
    }
    //Admin Logged Out
    public function logout(){
        Auth::logout();
        return redirect()->to('/')->with('message', 'Your are logged out!');
        // return redirect()->route('login');

    }
        

}







