@extends('layouts.home-layout')
@section('home-title')
MovoEasy | Register 
@endsection
@section('home-content')
<div class="wthree-dot">
	<h1>MovoEasy Packers signup Forms</h1>
	<div class="profile">
		<div class="wrap">
			
			<div class="content-main content-main1">
				<div class="w3ls-subscribe">
					<h4>New Customer?</h4>
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
					<form action="" method="post" id="form-signup">
                        {{ csrf_field() }}
						<input type="text" name="User[fullname]" id="fullname" placeholder="Full Name" required="">
						<input type="text" name="User[packer_name]" id="packer_name" placeholder="Packers Name" required="">
						<input type="email" name="User[email]" id="email" placeholder="Email" required="">
                        <input type="text" name="User[mobile]" id="mobile" placeholder="Mobile" required="">
						<input type="password" name="User[password]" id="password" placeholder="Password" required="">
						<input type="password" name="User[re_password]" id="re_password" placeholder="Confirm Password" required="">
						<input type="button" value="Sign Up" onclick="saveCreateUser();">
					</form>
                    <h4 style="padding-top:15px;">Existing Packers ? <a href="{{ URL::to('/admin') }}">Login Here</a></h4>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection