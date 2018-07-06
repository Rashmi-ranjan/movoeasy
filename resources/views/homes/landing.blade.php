@extends('layouts.home-layout')
@section('home-title')
MovoEasy | Home
@endsection
@section('home-content')
<div class="banner-bottom">
	<div class="col-md-7 bannerbottomleft">
        <div class="video-grid-single-page-agileits">
            <div data-video="d3q5mRA5djY" id="video"> <img src="{{ asset('public/frontend/images/bg2.jpg')}}" alt="" class="img-responsive" /> </div>
        </div>
	</div>
	<div class="col-md-5 bannerbottomright">
        @include('elements/home-slider-form')
	</div>
	<div class="clearfix"></div>
</div>

<!-- Clients -->
<div class=" col-md-6 clients">
    <h3>Top Mover&Packers</h3>
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="client">
                        <img src="{{ asset('public/frontend/images/t1.jpg')}}" alt="" />
                        <h5>Brian Fantana</h5>
                        <div class="clearfix"> </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .</p>   
                </li>
                <li>	
                    <div class="client">
                    <img src="{{ asset('public/frontend/images/t2.jpg')}}" alt="" />
                        <h5>Brick Tamland</h5>
                        <div class="clearfix"> </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .</p> 
                </li>
                <li>
                    <div class="client">
                    <img src="{{ asset('public/frontend/images/t3.jpg')}}" alt="" />
                        <h5>Ron Burgundy</h5>
                        <div class="clearfix"> </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .</p>
                        
                </li>
                <li>
                    <div class="client">
                    <img src="{{ asset('public/frontend/images/t4.jpg')}}" alt="" />
                        <h5>Arturo Mendez</h5>
                        <div class="clearfix"> </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .</p>
                        
                </li>
            </ul>
        </div>
    </section>
</div>
<!-- Counter -->
<div class="col-md-6 services-bottom">
    <div class="col-md-6 agileits_w3layouts_about_counter_left">
        <div class="countericon">
            <i class="fa fa-truck" aria-hidden="true"></i>
        </div>
        <div class="counterinfo">
            <p class="counter">1126</p> 
            <h3>Transport vehicles</h3>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="col-md-6 agileits_w3layouts_about_counter_left">
        <div class="countericon">
            <i class="fa fa-fighter-jet" aria-hidden="true"></i>
        </div>
        <div class="counterinfo">
            <p class="counter">180</p> 
            <h3>International Service</h3>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
    <div class="col-md-6 agileits_w3layouts_about_counter_left">
        <div class="countericon">
            <i class="fa fa-calendar" aria-hidden="true"></i>
        </div>
        <div class="counterinfo">
            <p class="counter">20</p>
            <h3>Years Of Service</h3>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="col-md-6 agileits_w3layouts_about_counter_left">
        <div class="countericon">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <div class="counterinfo">
            <p class="counter">800</p>
            <h3>Happy clients</h3>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
<!-- //Counter -->

<!-- our blog -->
<section class="blog" id="blog">
	<div class="container">
		<div class="heading">
			<h3>Ours Mover&Packers (make this slider)</h3>
		</div>
		<div class="blog-grids">
		<div class="col-md-4 blog-grid">
			<a href="#" data-toggle="modal" data-target="#myModal"><img src="{{ asset('public/frontend/images/bg4.jpg')}}" alt="" /></a>
			<h5>June 10,2017</h5>
			<h4><a href="#" data-toggle="modal" data-target="#myModal">Road Way Transport</a></h4>
			<p> Lorem ipsum dolor sit amet, consectetur adipi scingelit. Vestibulum orci justo, vehicula vel sapien et, feugiat sapien. Integer sit amet.</p>
			<div class="readmore-w3">
				<a class="readmore" href="#" data-toggle="modal" data-target="#myModal">Read More</a>
			</div>
		</div>
		<div class="col-md-4 blog-grid">
			<a href="#" data-toggle="modal" data-target="#myModal"><img src="{{ asset('public/frontend/images/bg7.jpg')}}" alt="" /></a>
			<h5>June 17,2017</h5>
			<h4><a href="#" data-toggle="modal" data-target="#myModal">Water Way Transport</a></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipi scingelit. Vestibulum orci justo, vehicula vel sapien et, feugiat tristique.</p>
			<div class="readmore-w3">
				<a class="readmore" href="#" data-toggle="modal" data-target="#myModal">Read More</a>
			</div>
		</div>
		<div class="col-md-4 blog-grid">
			<a href="#" data-toggle="modal" data-target="#myModal"><img src="{{ asset('public/frontend/images/bg8.jpg')}}" alt="" /></a>
			<h5>June 26,2017</h5>
			<h4><a href="#" data-toggle="modal" data-target="#myModal">Rail Transport</a></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipi scingelit. Vestibulum orci justo, vehicula vel sapien et, feugiat sapien. Integer sit amet.</p>
			<div class="readmore-w3">
				<a class="readmore" href="#" data-toggle="modal" data-target="#myModal">Read More</a>
			</div>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>
</section>


<!-- bootstrap-modal-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Transporters
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
            </div>
                <div class="modal-body">
                    <img src="{{ asset('public/frontend/images/bg3.jpg')}}" alt=" " class="img-responsive" />
                    <p>Ut enim ad minima veniam, quis nostrum 
                        exercitationem ullam corporis suscipit laboriosam, 
                        nisi ut aliquid ex ea commodi consequatur? Quis autem 
                        vel eum iure reprehenderit qui in ea voluptate velit 
                        esse quam nihil molestiae consequatur, vel illum qui 
                        dolorem eum fugiat quo voluptas nulla pariatur.
                        <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
                            esse quam nihil molestiae consequatur.</i></p>
                </div>
        </div>
    </div>
</div>
<!-- //bootstrap-modal-pop-up --> 
@endsection

