<?php
    $curRoute       =   Route::currentRouteAction();
    $controller     =   '';
    $action         =   '';
    if($curRoute != ''){
        if(strpos($curRoute,'@')){
            $routePartArr   =   explode('@',$curRoute);
            if(isset($routePartArr) && is_array($routePartArr) && count($routePartArr) > 0){
                if(isset($routePartArr[0])){
                    $controllerName =   $routePartArr[0];
                    $controllerNameArr = explode("/",str_replace('\\', '/', $controllerName));
                    //print_r($controllerNameArr);
                    $controller =   $controllerNameArr[3];
                }
                if(isset($routePartArr[1])){
                    $action     =   $routePartArr[1];
                }
            }
        }
    }
    //echo $controller."+++".$action."++".$controllerName;
    //$companyname       = 	BaseController::getCompanyname(1);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('admin-title')</title>
        
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<!-- <link rel="shortcut icon" href="public/home/img/favicon.png" type="image/x-icon" /> -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap.min.css')}}"> 
		<link rel="stylesheet" href="{{asset('public/admin/fonts/css/font-awesome.min.css')}}"> 
		<link rel="stylesheet" href="{{asset('public/admin/css/animate.min.css')}}"> 
		<link rel="stylesheet" href="{{asset('public/admin/css/custom.css')}}"> 
		<link rel="stylesheet" href="{{asset('public/admin/css/icheck/flat/green.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}"> 
		
		 
    </head>
    <body style="background:#F7F7F7;">
    	<div id="loddingImage">
            <img src="{{ asset('public/admin/img/loader_large.gif')}}" alt="" />
            		
		</div>
		@yield('login-content')
        <script src="{{asset('public/admin/js/jquery.min.js')}}"></script>
		@include('includes.login-script')
    </body>
</html>

