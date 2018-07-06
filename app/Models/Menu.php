<?php
	
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model{
     protected $table = 'menus';

    //  protected $fillable = ['emp_user_id', 'qca_score','call_type','city_id', 'location_id','qca_name','zm_user_id','agent_code','created_at','updated_at','call_recording_url'];

    //  protected $dates = ['call_date', 'date','qca_evaluation_date','zm_evaluation_date','agent_acknowledage_date'];
    
    
    public static function getTableName(){
        return with(new static)->getTable();
    }
	
	public static $rules													=   array(
																					'menu_name'						=>  'required',
																					'controller'					=>  'required',
																					'menu_order'					=>  'required',
																					'menu_icon'						=>	'required',
		
																				);  
	public static $messages													=   array(
																					'menu_name.required'			=>  'This field is required',
																					'controller.required'			=>  'This field is required',
																					'menu_order.required'			=>  'This field is required',
																					'menu_icon.required'			=>  'This field is required',
																				);
    
}

	