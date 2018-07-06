<?php
	
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SubMenu extends Model{
     protected $table = 'sub_menus';

    //  protected $fillable = ['emp_user_id', 'qca_score','call_type','city_id', 'location_id','qca_name','zm_user_id','agent_code','created_at','updated_at','call_recording_url'];

    //  protected $dates = ['call_date', 'date','qca_evaluation_date','zm_evaluation_date','agent_acknowledage_date'];
    
    
    public static function getTableName(){
        return with(new static)->getTable();
    }
	
	public static $rules									=   array(
																	'menu_id'							=>  'required',
																	'sub_menu_name'						=>  'required',
																	'sub_menu_url'						=>  'required',
																	'sub_menu_order'					=>  'required',
																	'action'							=>  'required',

																);  
	public static $messages									=   array(
																	'menu_id.required'					=>  'This field is required',
																	'sub_menu_name.required'			=>  'This field is required',
																	'sub_menu_url.required'				=>  'This field is required',
																	'sub_menu_order.required'			=>  'This field is required',
																	'action.required'					=>  'This field is required',
																);
    
}
