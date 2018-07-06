<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\models\Menu;
use App\models\SubMenu;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static function getCompanyname($id) {
        $companyName = '';
        if (isset($id) && $id != '') {

            $companyNameObj = DB::table('organisations')
                    ->select('organisations.organisation_name')
                    ->where('organisations.id', '=', $id)
                    ->where('organisations.status', '=', 'Y')
                    ->first();
            //echo "<pre>"; print_r($companyNameObj); echo "<pre>";
            if (is_object($companyNameObj)) {
                $companyName = $companyNameObj->organisation_name;
            }
            return $companyName;
        } else {
            return '';
        }
    }
    /**
     * Used for fetching different master table
     * display field column value depending on
     * argument 
     * 
     * @param 	int 		$id
     * @param 	string 		$table_name
     * @param 	string 		$field_name
     *
     * @return response
     */
    public static function getDisplayFieldName($id = 0, $table_name = '', $fieldArr = array()) {
        $response = '';
        $dbResponseObj = '';
        if ((int) $id) {
            $responseObj = DB::table("$table_name")
                    ->where("$table_name.id", '=', $id);

            if (is_array($fieldArr) && count($fieldArr) > 0) {
                foreach ($fieldArr as $colKey => $cloName) {
                    $selectArr[] = "$table_name.$cloName";
                }
                $responseObj->select($selectArr);
            }
            $dbResponseObj = $responseObj->first();
        }
        if (is_array($fieldArr) && count($fieldArr) > 0) {
            foreach ($fieldArr as $colKey => $cloName) {
                if (isset($dbResponseObj->$cloName) && $dbResponseObj->$cloName != '') {
                    $response .= $dbResponseObj->$cloName;
                }
            }
        }
        return $response;
    }
    public static function getMastersList($table_name = '', $col_name = '') {
        $response               =   '';
        $response[0]['id']      =   '';
        $response[0]['name']    =   'Select ';
        $responseArr            =   DB::table($table_name)
                                        ->select('id',$col_name)
                                        ->where('status', '=', 'Y')
                                        ->get();
        if(is_object($responseArr)){
            foreach($responseArr as $key => $value){
                $response[$key+1]['id']     = $value->id;
                $response[$key+1]['name']     = $value->$col_name;
            }
        }
        return $response;
    }
    public static function getPackersList($table_name = '', $col_name = '') {
        $response               =   '';
        $response[0]['id']      =   '';
        $response[0]['name']    =   'Packer Name ';
        $responseArr            =   DB::table($table_name)
                                        ->select('id',$col_name)
                                        ->where('role_id','=',2)
                                        ->where('is_active', '=', 'Y')
                                        ->get();
        if(is_object($responseArr)){
            foreach($responseArr as $key => $value){
                $response[$key+1]['id']     = $value->id;
                $response[$key+1]['name']     = $value->$col_name;
            }
        }
        return $response;
    }
    
}
