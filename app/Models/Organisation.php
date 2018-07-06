<?php
    use Illuminate\Auth\UserTrait;
    use Illuminate\Auth\UserInterface;
    use Illuminate\Auth\Reminders\RemindableTrait;
    use Illuminate\Auth\Reminders\RemindableInterface;

    class Organisation extends Eloquent implements UserInterface, RemindableInterface {
            use UserTrait, RemindableTrait;		
            protected $table														=	'organisations';

            public static $rules													=   array(
                                                                                                                                                                            'organisation_name'						=>  'required',
                                                                                                                                                                    );  
            public static $messages													=   array(
                                                                                                                                                                            'organisation_name.required'				=>  'This field is required',
                                                                                                                                                                    );
    }