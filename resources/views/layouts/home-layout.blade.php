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
	<!-- <title>Titmetable Login</title> -->
    <title>@yield('home-title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('public/frontend/css/flexslider.css')}}" type="text/css" media="all" /><!-- for testimonials -->

    <!-- css files -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.css')}}"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS --> 
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/lightbox.css')}}"> <!-- portfolio-CSS -->
    <!-- //css files -->
    <link rel="stylesheet" href="{{asset('public/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/js/plugins/datepicker/datepicker3.css')}}">
    
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<!--===============================================================================================-->
<style>
    .error-message{
        color:red;
        font-size:12px;
        /* padding:7px; */
    }
</style>
</head>
<body>
@include('elements/home-header')
@if($action == 'landing')
@include('elements/home-slider')
@endif
@yield('home-content')
@include('elements/home-footer')				
<!-- js -->
<script type="text/javascript" src="{{ asset('public/frontend/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/bootstrap.js')}}"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js -->	

<!-- start-smoth-scrolling -->
<script src="{{ asset('public/frontend/js/SmoothScroll.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/easing.js')}}"></script>
<script src="{{ asset('public/frontend/js/simplePlayer.js')}}"></script>
<script src="{{ asset('public/frontend/js/responsiveslides.min.js')}}"></script>
<script src="{{ asset('public/frontend/js/waypoints.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/counterup.min.js')}}"></script>
<script defer src="{{ asset('public/frontend/js/jquery.flexslider.js')}}"></script>
<script defer src="{{ asset('public/js/plugins/bootstrap-datetimepicker/moment.js')}}"></script>
<script defer src="{{ asset('public/js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script defer src="{{ asset('public/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>

<script defer src="{{ asset('public/js/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script defer src="{{ asset('public/js/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script defer src="{{ asset('public/js/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>


@include('includes/home-script')

</body>
</html>