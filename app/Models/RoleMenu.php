<?php
	use Illuminate\Auth\UserTrait;
	use Illuminate\Auth\UserInterface;
	use Illuminate\Auth\Reminders\RemindableTrait;
	use Illuminate\Auth\Reminders\RemindableInterface;

	class RoleMenu extends Eloquent implements UserInterface, RemindableInterface {
		use UserTrait, RemindableTrait;		
		protected $table														=	'role_menus';
		public static $rules													=   array(
																						'role_id'                    =>  'required',
																					);
		public static $messages													=   array(
																						'role_id.required'           =>  'This field is required',
																					);
	}