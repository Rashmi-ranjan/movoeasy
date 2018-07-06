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
<html lang="en">
<head>
    <title>@yield('admin-title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin/css/bootstrap.min.css')}}">
	<!-- plugins:css -->
	<link rel="stylesheet" href="{{asset('public/admin/fonts/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/animate.min.css')}}">
	
	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}">

	<link rel="stylesheet" href="{{asset('public/admin/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/icheck/flat/green.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/floatexamples.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/js/plugins/bootstrap-datepicker/css/datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/js/colorbox/colorbox.css')}}">
	<script src="{{asset('public/admin/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/admin/js/nprogress.js')}}"></script>
	
<!--===============================================================================================-->
</head>
<body class="nav-md">
	<div id="loddingImage">
		<% HTML::image('public/admin/img/loader_large.gif') %>		
	</div>
        <!-- header logo: style can be found in header.less -->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    @include('elements.admin-leftpane')
                </div>
                @include('elements.admin-header')
                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('admin-content')
                    @include('elements.admin-footer')
                </div>
                <!-- page content -->
            </div>
        </div>
		
        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

	<script src="{{asset('public/admin/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/admin/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
	<script src="{{asset('public/admin/js/nicescroll/jquery.nicescroll.min.js')}}"></script>

	<script src="{{asset('public/admin/js/icheck/icheck.min.js')}}"></script>
	<script src="{{asset('public/admin/js/moment/moment.min.js')}}"></script>

	<script src="{{asset('public/admin/js/datepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('public/admin/js/custom.js')}}"></script>
	<script src="{{asset('public/admin/js/skycons/skycons.min.js')}}"></script>
	<script src="{{asset('public/admin/js/plugins/input-mask/jquery.inputmask.js')}}"></script>

	<script src="{{asset('public/admin/js/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
	<script src="{{asset('public/admin/js/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
	<script src="{{asset('public/admin/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('public/admin/js/magicsuggest.js')}}"></script>
	<script src="{{asset('public/admin/js/colorbox/jquery.colorbox-min.js')}}"></script>
    @include('includes/admin-script')
</body>
</html>