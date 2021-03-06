@extends('layouts.home-layout')
@section('home-title')
MovoEasy | Services
@endsection
@section('home-content')
<div class="banner1">
</div>
<div class="about-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="index.html">Home</a><i>></i></li>
            <li>Our Services</li>
        </ul>
    </div>
</div>
<!-- services section -->
    <div class="services" id="services">
        <div class="heading">
            <h2>Our Services</h2>
        </div>
        <div class="container">
            <div class="servicegrids">
                <div class="servicetopgrids">
                    <div class="col-md-4 servicegrid1">
                        <h5>01</h5>
                        <h4>Airways Transport</h4>
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem.</p>
                    </div>
                    <div class="col-md-4 servicegrid1">
                        <h5>02</h5>
                        <h4>Roadways Transport</h4>
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem.</p>
                    </div>
                    <div class="col-md-4 servicegrid1">
                        <h5>03</h5>
                        <h4>Waterways Transport </h4>
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="servicebottomgrids">
                    <div class="col-md-4 servicegrid1">
                        <h5>04</h5>
                        <h4>Logistic Management</h4>
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem.</p>
                    </div>
                    <div class="col-md-4 servicegrid1">
                        <h5>05</h5>
                        <h4>Delivery Unlimited</h4>
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem.</p>
                    </div>
                    <div class="col-md-4 servicegrid1">
                        <h5>06</h5>
                        <h4>Fast & Safe Service</h4>
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<!-- //services section -->

<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Transport 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/bg3.jpg" alt=" " class="img-responsive" />
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

<!-- services bottom -->
    <div class="Servicebottom">
        <div class="layer">
        <div class="col-md-5">
        </div>
        <div class="col-md-7 Servicebottomtext">
            <h3>Fast and Safe Transport Service</h3>
            <h3>Specialized heavy-Duty Vehicles</h3>
            <h3>Shipping Services & Logistics Management</h3>
            <p>Ut enim ad minima veniam, quis nostrum 
                exercitationem ullam corporis suscipit laboriosam, 
                nisi ut aliquid ex ea commodi consequatur? Quis autem consequatur? Quis autem 
                vel eum iure reprehenderit qui in ea voluptate velit vel eum iure reprehenderit qui in ea voluptate velit 
                esse quam nihil molestiae consequatur, vel quidolorem eum fugiat quo voluptas nulla pariatur.</p>
            <h4><i class="fa fa-taxi" aria-hidden="true"></i>International Transport Deliver System</h4>
            <h4><i class="fa fa-truck" aria-hidden="true"></i>Truck Logistics Service</h4>
        </div>
        <div class="clearfix"></div>
        </div>
    </div>
<!-- //services bottom -->

<!-- team -->
	<div class="team" id="team">
		<div class="container">
		<div class="heading">
			<h3>Our Dealers</h3>
		</div>
			<div class="wthree_team_grids">
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="{{ asset('public/frontend/images/team1.jpg')}}" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Transporters</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>Max Payne</h4>
					<p>Transport Dealer</p>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="{{ asset('public/frontend/images/team2.jpg')}}" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Transporters</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>Michael Lii</h4>
					<p>Transport Dealer</p>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="{{ asset('public/frontend/images/team3.jpg')}}" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Transporters</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>Mark</h4>
					<p>Transport Dealer</p>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="{{ asset('public/frontend/images/team4.jpg')}}" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Transporters</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>John smith</h4>
					<p>Transport Dealer</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //team -->


@endsection

