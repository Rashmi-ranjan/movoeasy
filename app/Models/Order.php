<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Order extends Model {
        protected $table =	'orders';

        public static $rules							=   array(
                                                                    // 'user_id'					=>  'required',
                                                                    'name'						=>  'required',
                                                                    'email'						=>  'required',
                                                                    'mobile'					=>  'required',
                                                                    'trans_from'				=>  'required',
                                                                    'trans_to'					=>  'required',
                                                                    'mover_date'			    =>  'required',
                                                            );  
        public static $messages							=   array(
                                                                    // 'user_id.required'			=>  'This field is required',
                                                                    'name.required'				=>  'This field is required',
                                                                    'email.required'			=>  'This field is required',
                                                                    'mobile.required'			=>  'This field is required',
                                                                    'trans_from.required'		=>  'This field is required',
                                                                    'trans_to.required'			=>  'This field is required',
                                                                    'mover_date.required'		=>  'This field is required',

                                                            );
    }
?>