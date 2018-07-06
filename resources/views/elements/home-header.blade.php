<div class="header">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a href="{{url('/')}}">MovoEasy</a></h1>
        </div>
        <div class="top-nav-text">
            <div class="nav-contact-w3ls"><i class="fa fa-phone" aria-hidden="true"></i><p>+0(12) 444 262 399</p></div>
            @if(isset(Auth::user()->fullname) && Auth::user()->fullname != '')
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        @if(isset(Auth::user()->fullname) && Auth::user()->fullname != '')
                            {{ Auth::user()->fullname }}
                        @endif
                        <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                            <li>
                            <a href="{{ URL::to('censor/dashboard') }}"> Admin Panel</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/logout') }}"> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>

        <!-- navbar-header -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="hvr-underline-from-center {{ Request::is('/') ? 'active' : ''}}" href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('homes/services')}}" class="hvr-underline-from-center {{ Request::is('homes/services') ? 'active' : ''}}">Services</a></li>
                <li><a href="#team" class="hvr-underline-from-center scroll scroll">Mover&Packers</a></li>
                <li><a href="{{url('homes/gallery')}}" class="hvr-underline-from-center {{ Request::is('homes/gallery') ? 'active' : ''}}">Gallery</a></li>
                <li><a href="{{url('homes/contact')}}" class="hvr-underline-from-center {{ Request::is('homes/contact') ? 'active' : ''}}">Contact</a>
                @if(!isset(Auth::user()->id))
                <li><a href="{{url('/admin')}}" target="_blank" class="hvr-underline-from-center {{ Request::is('users/login') ? 'active' : ''}}">login</a>
                @endif
            </ul>
        </div>
        <div class="clearfix"> </div>	
    </nav>
</div>