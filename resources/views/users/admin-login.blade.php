@extends('layouts.login-layout')
@section('home-title')
MovoEasy | Login 
@endsection
@section('login-content')
<div class="">
    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                @if(Session::has('error'))
                    <div role="alert" class="alert alert-danger alert-dismissable">
                        <strong>Error !</strong>
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if(Session::has('message'))	
                    <div role="alert" class="alert alert-success alert-dismissable">
                        <strong></strong>									
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form action="user/signup" method="post" role="form" id="form-login">
                {{ csrf_field() }}
                    <h1>Login Form</h1>   
                    <div>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="">			
                    </div>
                    <div>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">				
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-primary submit">LOGIN</button>
                        <a class="reset_pass" href="{{ URL::to('user/lost-password') }}">Lost your password?</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">New Packers?
                            <a href="{{ URL::to('/user-register') }}" class="to_register"> Create Account </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h4><i style="font-size: 26px;"></i> {{ $companyname }}</h4>
                            <p>{{ date('Y') }} All Rights Reserved. {{ $companyname }} </p>
                        </div>
                    </div>
                </form>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
</div>
@endsection