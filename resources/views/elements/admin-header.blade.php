<div class="top_nav">
    <div class="nav_menu">
      <nav class="" role="navigation">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              
              @if(isset(Auth::user()->fullname) && Auth::user()->fullname != '')
                {{ Auth::user()->fullname }}
              @endif
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
              <li><a href="{{ URL::to('user/profile') }}">  Profile</a></li>
              <li>
                <a href="{{ URL::to('user/changepassword') }}">
                  <span>Change password</span>
                </a>
              </li>
              <li><a href="{{ URL::to('user/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
    </div>
</div>

