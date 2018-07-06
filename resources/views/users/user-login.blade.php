@extends('layouts.home-layout')
@section('home-title')
MovoEasy | Login 
@endsection
@section('home-content')
<div class="wthree-dot">
	<h1>MovoEasy Login & signup Forms</h1>
	<div class="profile">
		<div class="wrap">
			<div class="content-main">
				<div class="w3ls-subscribe w3ls-subscribe1">
					<h4>already have an account?</h4>
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
					<!-- s<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec quam</p> -->
					<form action="user/signup" method="post" role="form" id="form-login">
                		{{ csrf_field() }}
						<input type="email" name="email" placeholder="Email" required="">
						<input type="password" name="password" placeholder="Password" required="">
						<input type="submit" value="Login">
						<h4 style="padding-top:15px;">New Packers? <a href="{{ URL::to('/user-register') }}">Login Here</a></h4>
					</form>
				</div>
			</div>
			<!-- <div class="content-main content-main1">
				<div class="w3ls-subscribe">
					<h4>New Customer?</h4>
					<p>Nunc nec libero et velit dapibus auctor. Etiam vitae condimentum leo, in dapibus lacus. Suspendisse scelerisque</p>
					<form action="#" method="post">
						<input type="text" name="Search" placeholder="First Name" required="">
						<input type="text" name="Search" placeholder="Last Name" required="">
						<input type="email" name="Search" placeholder="Email" required="">
						<input type="password" name="password" placeholder="Password" required="">
						<input type="password" name="password" placeholder="Confirm Password" required="">
						<input type="submit" value="Sign Up">
					</form>
				</div>
			</div> -->
		</div>
	</div>
</div>
@endsection