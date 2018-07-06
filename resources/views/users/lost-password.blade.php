@extends('layouts.login-layout')
@section('home-title')
MovoEasy | Forgot Password 
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
	                <div role="alert" class="alert alert-success alert-dismissible fade in" style="display:none;" id="sucMsgDiv">
	                  	<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
	                  	<span class="sucmsgdiv"></span>
	                </div>
	                <div role="alert" class="alert alert-danger alert-dismissible fade in" style="display:none;" id="failMsgDiv">
	                  	<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
	                  	<span class="failmsgdiv"></span>
	                </div>
                    <form action="" method="post" role="form" id="form-lostpswd">
                    {{ csrf_field() }}  
	                	<h1>Lost Password</h1>
	                	<p>Enter your email address below and we'll send you instructions to reset your password.</p>
                        <div>
                            <input type="text" name="User[email_forgot]" class="form-control" id="email_forgot" placeholder="Email" required="">		
                        </div>
                        
                        <div class="text-left" >
							<button type="button" class="btn btn-primary submit" onclick="validateLostpswdMail();">Reset Password</button>
			            </div>  
						
						<div class="clearfix"></div>
			            <div class="separator">
			              	<p class="change_link">
			                	I remembered. Let me <a href="{{ URL::to('/admin') }}" class="to_register"><b>Log in</b></a>again. 
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