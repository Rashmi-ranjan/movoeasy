<?php
Route::group(['middleware' => 'admin'],function(){
    Route::get('censor/dashboard','CensorController@dashboard')->name('dashboard');
    Route::get('usersetting/user-list','UsersettingController@userList')->name('userList');
    Route::get('usersetting/edit-user/{id}','UsersettingController@editUser')->name('editUser');
    Route::post('usersetting/approveuser','UsersettingController@approveuser')->name('approveuser');
    Route::post('usersetting/pendinguser','UsersettingController@pendinguser')->name('pendinguser');
    Route::post('usersetting/discarduser','UsersettingController@discarduser')->name('discarduser');
    Route::post('usersetting/updateuser','UsersettingController@updateUser')->name('updateUser');
    Route::get('order/order-list','OrderController@orderList')->name('orderList');
});

Route::get('/','HomeController@landing')->name('Landing');
Route::get('homes/services','HomeController@services')->name('services');
Route::get('homes/gallery','HomeController@gallery')->name('gallery');
Route::get('homes/contact','HomeController@contact')->name('contact');
Route::get('/admin','UserController@adminLogin')->name('adminLogin');
Route::get('/user-login','UserController@userLogin')->name('userLogin');
Route::get('/user-register','UserController@userRegister')->name('userRegister');
Route::post('user/signup','UserController@signup')->name('signup');
Route::post('users/savecreateuser','UserController@savecreateuser')->name('savecreateuser');
Route::get('user/logout','UserController@logout');
Route::post('users/usersignup','UserController@userSignup')->name('userSignup');
Route::post('home/saveorder','HomeController@saveorder')->name('saveorder');
Route::get('user/lost-password','UserController@lostPassword')->name('lostPassword');
Route::post('user/validatelostpswdmail','UserController@validatelostpswdmail')->name('validatelostpswdmail');
Route::get('user/reset-password/{token}/{id}','UserController@resetPassword')->name('resetPassword');
Route::post('user/resetnewpassword','UserController@resetnewpassword')->name('resetnewpassword');
?>