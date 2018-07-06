<?php
	use Illuminate\Auth\UserTrait;
	use Illuminate\Auth\UserInterface;
	use Illuminate\Auth\Reminders\RemindableTrait;
	use Illuminate\Auth\Reminders\RemindableInterface;

	class Role extends Eloquent implements UserInterface, RemindableInterface {
		use UserTrait, RemindableTrait;		
		protected $table														=	'roles';
		public static $rules													=   array(
																						'role_name'                    =>  'required',
																					);  
		public static $messages													=   array(
																						'role_name.required'           =>  'This field is required',
																					);
	}