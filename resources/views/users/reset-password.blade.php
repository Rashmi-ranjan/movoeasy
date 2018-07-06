@extends('layouts.login-layout')
@section('home-title')
MovoEasy | Reset New Password 
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
                    <form action="" method="post" role="form" id="form-resetpswd">
                        {{ csrf_field() }}  
                        <input type="hidden" id="token" name="User[token]" value="{{ $layoutArr['token'] }}" />
                        <input type="hidden" id="id" name="User[id]" value="{{ $layoutArr['id'] }}" />
	                
	                	<h1>Reset Password</h1>
	                	<div class="form-group">
	                      	<div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="text" name="User[new_password]" class="form-control" id="new_password" placeholder="Enter New Password" required="">		
	                      	</div>
	                    </div>	
						<div class="text-left">
							<button type="button" class="btn btn-primary submit" onclick="resetPassword();">Submit</button>
							<button type="button" class="btn btn-danger reset" onclick="resetFormVal('form-resetpswd',0);">Reset</button>
			            </div>
						<div class="clearfix"></div>
			            <div class="separator">
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