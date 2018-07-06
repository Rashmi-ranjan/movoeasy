
<div class="left_col scroll-view">
  	<div class="navbar nav_title" style="border: 0;">
    	<a href="{{ URL::to('/') }}" class="site_title"> <span>Movo Easy</span></a>
  	</div>
  	<div class="clearfix"></div>
  	<!-- menu prile quick info -->
  	<div class="profile">
	    <div class="profile_pic">
        <img src="{{ asset('public/admin/img/user.png') }}" class="img-circle profile_img" alt=""/>
	    	               
	    </div>
	    <div class="profile_info">
		    @if(isset(Auth::user()->fullname))
		    	<span>Welcome,</span>
	            <h2>{{ Auth::user()->fullname }}</h2>
	        @endif
	    </div>
	</div>
  	<!-- /menu prile quick info -->
  	<br />
    <div style="height:100px"></div>	
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li class="{{ Request::is('censor/dashboard')? 'active' : ''}}">
                    <a href="{{ URL::to('censor/dashboard') }}">
                        <i class=""></i> Dashboard
                    </a>
                </li> 
                @if(isset(Auth::user()->role_id) && Auth::user()->role_id == 1) 
                <li>
                    <a> User Setting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="{{ URL::to('usersetting/user-list') }}">User List</a></li>
                    </ul>
                </li>
                @endif
                @if(isset(Auth::user()->role_id) && Auth::user()->role_id == 2)
                <li>
                    <a> Manage Order <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="{{ URL::to('order/order-list') }}">Order List</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->
</div>