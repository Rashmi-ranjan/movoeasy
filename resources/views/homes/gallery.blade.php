@extends('layouts.home-layout')
@section('home-title')
MovoEasy | Gallery
@endsection
@section('home-content')
<div class="banner1">
</div>
<div class="about-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="index.html">Home</a><i>></i></li>
			<li>Gallery</li>
		</ul>
	</div>
</div>
<!-- portfolio-inner-page -->
<div id="portfolio" class="portfolio">
    <div class="heading">
        <h3>Gallery</h3>
    </div>
    <div class="container">
        <div class="sap_tabs">			
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item"><span>Transport Area</span></li>
                    <li class="resp-tab-item"><span>Ship Transport</span></li>
                    <li class="resp-tab-item"><span>Truck Transport</span></li>
                    <li class="resp-tab-item"><span>Flight Transport</span></li>					
                </ul>	
                <div class="clearfix"> </div>	
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content">
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid1">
                            <a href="{{ asset('public/frontend/images/g1.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g1.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h2>Transport Area</h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid2">
                            <a href="{{ asset('public/frontend/images/g4.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g4.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid3">
                            <a href="{{ asset('public/frontend/images/g3.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g3.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid4">
                            <a href="{{ asset('public/frontend/images/g7.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g7.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid5">
                            <a href="{{ asset('public/frontend/images/g5.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g5.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid6">
                            <a href="{{ asset('public/frontend/images/g6.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g6.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid6">
                            <a href="{{ asset('public/frontend/images/g1.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g1.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid6">
                            <a href="{{ asset('public/frontend/images/g3.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g3.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid6">
                            <a href="{{ asset('public/frontend/images/g2.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/g2.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Transport Area</h5>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>		
                    <div class="tab-1 resp-tab-content">
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid1">
                            <a href="{{ asset('public/frontend/images/ship1.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/ship1.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Ship Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid2">
                            <a href="{{ asset('public/frontend/images/ship2.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/ship2.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Ship Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid3">
                            <a href="{{ asset('public/frontend/images/ship3.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/ship3.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Ship Transport</h5>
                                </div>
                            </a>
                        </div>
                            <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid4">
                            <a href="{{ asset('public/frontend/images/ship4.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/ship4.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Ship Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid5">
                            <a href="{{ asset('public/frontend/images/ship5.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/ship5.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Ship Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tab-1 resp-tab-content">
                    
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid1">
                            <a href="{{ asset('public/frontend/images/train1.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/train1.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Truck Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids  portfolio-grid2">
                            <a href="{{ asset('public/frontend/images/train2.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/train2.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Truck Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids  portfolio-grid3">
                            <a href="{{ asset('public/frontend/images/truck3.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/truck3.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Truck Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid1">
                            <a href="{{ asset('public/frontend/images/truck4.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/truck4.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Truck Transport</h5>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid2">
                            <a href="{{ asset('public/frontend/images/truck5.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/truck5.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Truck Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tab-1 resp-tab-content">
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid1">
                            <a href="{{ asset('public/frontend/images/flight1.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/flight1.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Flight Transport</h5>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid2">
                            <a href="{{ asset('public/frontend/images/flight2.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/flight2.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Flight Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids  portfolio-grid3">
                            <a href="{{ asset('public/frontend/images/flight3.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/flight3.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Flight Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid4">
                            <a href="{{ asset('public/frontend/images/flight4.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/flight4.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Flight Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid4">
                            <a href="{{ asset('public/frontend/images/flight5.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/flight5.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Flight Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 portfolio-grids portfolio-grid4">
                            <a href="{{ asset('public/frontend/images/flight6.jpg')}}" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                                <img src="{{ asset('public/frontend/images/flight6.jpg')}}" class="img-responsive zoom-img" alt=""/>
                                <div class="b-wrapper">
                                    <h5>Flight Transport</h5>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>						
            </div>
        </div>
    </div>
</div>
<!-- //portfolio-inner-page -->
@endsection

