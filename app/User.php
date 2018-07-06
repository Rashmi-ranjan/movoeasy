<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules		= 	array(
                                        'PackerSignup'					=>	array(
                                                                            'fullname'		=>	'required',
                                                                            'email'			=>	'required|email',
                                                                            'mobile'		=>	'required',
                                                                            'packer_name'   =>	'required',
                                                                            'password'		=>	'required',
                                                                            're_password'  => 'required|same:password',
                                                                        ),
                                        'editsignup'				=>	array(
                                                                            'fullname'		=>	'required',
                                                                            'email'			=>	'required|email',
                                                                            'mobile'		=>	'required',
                                                                            'role_id'       =>  'required',
                                                                        ),
                                        'lostpasswordemail'			=>	array(
																			'email_forgot'				=>	'required|email',
                                                                        ),
                                        'resetpassword'				=>	array(
																			'new_password'				=>	'required',
																		),
                                    );
    public static $messages 	= 	array(
                                            'fullname.required'				=>  'This field is required',
                                            'email.required'					=>  'This field is required',
                                            'email.email'						=>  'Enter valid email',
                                            'email.unique'						=>  'This email is already exist',
                                            'mobile.required'					=>  'This field is required',
                                            'mobile.unique'						=>  'This Mobile Number is already exist',
                                            'mobile.integer'					=>	'OTP Must be numeric',
                                            'mobile.between'					=>	'Mobile Number Must be 10 Digit',
                                            'password.required'					=>  'This field is required',
                                            'user_type.required'				=>  'Select User Type',
                                            'password.same'			            =>  'Confirm password Mismatch',
                                            're_password.required'		        =>	'This field is required',
                                            'packer_name.required'			    =>  'This field is required',
                                            'email_forgot.required'             =>  'Registered email Address requiered',
                                            'new_password.required'             =>  'New Password requiered',
                                            
                                        );
}
