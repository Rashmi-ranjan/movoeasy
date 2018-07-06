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

class UsersettingController extends Controller {
  
    //Admin after login showing dashboard
    public function userList(){
        $layoutArr              =   array();
        $pageTitle              =   'Registered user List';
        $statusType             =   array(
                                        '' => 'select',
                                        '1' => 'Active',
                                        '2' => 'Pending',
                                        '3' => 'Inactive',
                                    );
        $roleId                 =   Auth::user()->role_id;
        $dbObj                  =   DB::table('users');
        if (isset(Auth::user()->id) && Auth::user()->id != '') {
            if (Auth::user()->id == 1) {
                $dbObj->where('users.role_id', '!=', 1);
            } 
        }
        

        $userCnt                =   $dbObj->count();
        $custompaginatorres     =   $dbObj->orderBy('users.id', 'asc')->paginate(10);
        $layoutArr              =   array(
                                        'pageTitle'             =>  $pageTitle,
                                        'statusType'            =>  $statusType,
                                        'roleId'                =>  $roleId, 
                                        'custompaginatorres'    =>  $custompaginatorres,
                                        'userCnt'               =>  $userCnt
                                    );
        return view('usersetting/user-list',['layoutArr' => $layoutArr]);
    }
    public function editUser($id = 0){
        $viewDataObj                        =   array();
        $layoutArr                          =   array();
        $cuponDetailsArr                    =   array();
        $id                                 =   base64_decode(base64_decode($id));
        $rolesArr                           =   Controller::getMastersList('roles', 'role_name');
        if ($id) {
            $viewDataObj                    =   DB::table('users')
                                                    ->where('users.id', '=', $id)
                                                    ->first();
            if (is_object($viewDataObj)) {
                if (isset($viewDataObj->expired_date) && $viewDataObj->expired_date != '0000-00-00') {
                    $viewDataObj->expired_date = BaseController::DB2Date($viewDataObj->expired_date);
                } else {
                    $viewDataObj->expired_date = '';
                }
                $viewDataObj->password = '';
            }
            $pageTitle                      =   'Edit User';
            $frmBtn                         =   'Update';
        }
        $statusType                         =   array(
                                                    '' => 'select',
                                                    '1' => 'Active',
                                                    '2' => 'Pending',
                                                    '3' => 'Inactive',
                                                );
        $layoutArr                          =   array(
                                                    'viewDataObj'       =>  $viewDataObj,
                                                    'pageTitle'         =>  $pageTitle,
                                                    'statusType'        =>  $statusType,
                                                    'frmBtn'            =>  $frmBtn,
                                                    'rolesArr'          =>  $rolesArr
                                                );
        return view('usersetting/edit-user',['layoutArr' => $layoutArr]);
    }
    public function updateUser(){
        $valiationArr                                       =   array();
        $formDataArr                                        =   array();
        $formData                               =   Input::all();        
        if (isset(Auth::user()->id) && Auth::user()->id) {
            if (isset($formData['formdata']) && $formData['formdata'] != '') {
                parse_str($formData['formdata'], $formDataArr);
                // echo "<pre>"; print_r($formDataArr); echo "<pre>"; exit;
                if (isset($formDataArr['User']) && is_array($formDataArr['User']) && count($formDataArr['User']) > 0) {
                    $validator                              =   Validator::make($formDataArr['User'], User::$rules['editsignup'], User::$messages);
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
                        $organisation_id                    =   1;
                        $id                                 =   $formDataArr['id'];
                        if (isset($id) && $id != '') {
                            if (isset($formDataArr['User']['is_active']) && $formDataArr['User']['is_active'] != '') {
                                $status                     =   $formDataArr['User']['is_active'];
                            } else {
                                $status                     =   'Y';
                            }
                            if (isset($formDataArr['User']['role_id']) && $formDataArr['User']['role_id'] != '') {
                                $role_id                     =   $formDataArr['User']['role_id'];
                            }
                            $fullname                       = trim($formDataArr['User']['fullname']);
                            $email                          = trim($formDataArr['User']['email']);
                            $packer_name                    = trim($formDataArr['User']['packer_name']);

                            $tblObjCnt                      =   DB::table('users')
                                                                    ->where('users.fullname', '=', $fullname)
                                                                    ->where('users.email', '=', $email)
                                                                    ->where('users.id', '!=', $id)
                                                                    ->count();
                            if ($tblObjCnt == 0) {
                                try {
                                    $loopCnt++;
                                    $formDatasArr['User']['role_id'] = $role_id;
                                    $formDatasArr['User']['organisation_id'] = $organisation_id;
                                    $formDatasArr['User']['is_reset_req'] = "N";
                                    $formDatasArr['User']['is_active'] = $status;
                                    $formDatasArr['User']['fullname'] = $fullname;
                                    $formDatasArr['User']['packer_name'] = $packer_name;
                                    $formDatasArr['User']['email'] = $formDataArr['User']['email'];
                                    $formDatasArr['User']['mobile'] = $formDataArr['User']['mobile'];
                                    $tid = DB::table('users')
                                            ->where('id', $id)
                                            ->update($formDatasArr['User']);
                                    $saveCnt++;
                                } catch (ValidationException $e) {
                                    DB::rollback();
                                } catch (\Exception $e) {
                                    DB::rollback();
                                }
                                
                                // echo "<pre>"; print_r($loopCnt."++".$saveCnt); echo "<pre>"; exit;
                                if ($loopCnt = $saveCnt) {
                                    DB::commit();
                                    echo '****SUCCESS****User has been Updated successfully.';
                                } else {
                                    DB::rollback();
                                    echo '****ERROR****Unable to save data.';
                                }
                            } else {
                                echo '****ERROR****This User is already exist.';
                            }
                        }
                    }
                }
            }exit;
        } else {
            echo '****ERROR****please login to save data.';
            return Redirect::to('user/login');
        }exit;
    }
    public function approveuser() {
        if (isset(Auth::user()->id) && Auth::user()->id) {
            $loopCnt = 0;
            $saveCnt = 0;
            $inputData = Input::all();
            $id = $inputData['record_id'];
            DB::beginTransaction();
            if (isset($id) && $id != 0) {
                $tblObjCnt = DB::table('users')
                        ->where('users.is_active', '=', 'Y')
                        ->where('users.id', '=', $id)
                        ->count();
                if ($tblObjCnt == 0) {
                    try {
                        $loopCnt++;
                        $formDataArr['User']['is_active'] = "Y";
                        $formDataArr['User']['updated_at'] = date('Y-m-d h:i:s');
                        $id = DB::table('users')
                                ->where('id', $id)
                                ->update($formDataArr['User']);
                        $saveCnt++;
                    } catch (ValidationException $e) {
                        DB::rollback();
                    } catch (\Exception $e) {
                        DB::rollback();
                    }
                    if ($loopCnt = $saveCnt) {
                        DB::commit();
                        echo '****SUCCESS****User has been Approved successfully.';
                    } else {
                        DB::rollback();
                        echo '****ERROR****Unable to save data.';
                    }
                } else {
                    echo '****ERROR****This User already Approve.';
                }
            }
        } else {
            echo '****ERROR****please login to delete.';
            return Redirect::to('user/login');
        }exit;
    }
    public function pendinguser() {
        if (isset(Auth::user()->id) && Auth::user()->id) {
            $loopCnt = 0;
            $saveCnt = 0;
            $inputData = Input::all();
            $id = $inputData['record_id'];
            DB::beginTransaction();
            if (isset($id) && $id != 0) {
                $tblObjCnt = DB::table('users')
                        ->where('users.is_active', '=', 'P')
                        ->where('users.id', '=', $id)
                        ->count();
                if ($tblObjCnt == 0) {
                    try {
                        $loopCnt++;
                        $formDataArr['User']['is_active'] = "P";
                        $formDataArr['User']['updated_at'] = date('Y-m-d h:i:s');
                        $id = DB::table('users')
                                ->where('id', $id)
                                ->update($formDataArr['User']);
                        $saveCnt++;
                    } catch (ValidationException $e) {
                        DB::rollback();
                    } catch (\Exception $e) {
                        DB::rollback();
                    }
                    if ($loopCnt = $saveCnt) {
                        DB::commit();
                        echo '****SUCCESS****User has been Pending successfully.';
                    } else {
                        DB::rollback();
                        echo '****ERROR****Unable to save data.';
                    }
                } else {
                    echo '****ERROR****This User already Pending.';
                }
            }
        } else {
            echo '****ERROR****please login to delete.';
            return Redirect::to('user/login');
        }exit;
    }
    public function discarduser() {
        if (isset(Auth::user()->id) && Auth::user()->id) {
            $loopCnt = 0;
            $saveCnt = 0;
            $inputData = Input::all();
            $id = $inputData['record_id'];
            DB::beginTransaction();
            if (isset($id) && $id != 0) {
                $tblObjCnt = DB::table('users')
                        ->where('users.is_active', '=', 'N')
                        ->where('users.id', '=', $id)
                        ->count();
                if ($tblObjCnt == 0) {
                    try {
                        $loopCnt++;
                        $formDataArr['User']['is_active'] = "N";
                        $formDataArr['User']['updated_at'] = date('Y-m-d h:i:s');
                        $id = DB::table('users')
                                ->where('id', $id)
                                ->update($formDataArr['User']);
                        $saveCnt++;
                    } catch (ValidationException $e) {
                        DB::rollback();
                    } catch (\Exception $e) {
                        DB::rollback();
                    }
                    if ($loopCnt = $saveCnt) {
                        DB::commit();
                        echo '****SUCCESS****User has been Discard successfully.';
                    } else {
                        DB::rollback();
                        echo '****ERROR****Unable to save data.';
                    }
                } else {
                    echo '****ERROR****This User already Discard.';
                }
            }
        } else {
            echo '****ERROR****please login to delete.';
            return Redirect::to('user/login');
        }exit;
    }


        

}







?>