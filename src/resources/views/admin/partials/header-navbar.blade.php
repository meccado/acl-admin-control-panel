<header class="main-header">

  <!-- Logo -->
  <a href="/admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>CL</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>Control Panel</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        {{-- <!-- Messages: style can be found in dropdown.less-->
            @include('acl::admin.partials._messages')
        <!-- /.messages-menu -->

        <!-- Notifications Menu -->
            @include('acl::admin.partials._notifications')
        <!-- /.Notifications Menu -->

        <!-- Tasks Menu -->
            @include('acl::admin.partials._tasks')
        <!-- /.Tasks Menu --> --}}

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            @if(isset($user) && $user != null && $user->profile->avatar)
              <img src="{{ URL::asset($user->profile->avatar)}}" class="user-image" alt="User Image">
            @else
              <img src="{{ URL::asset('assets/bower_components/AdminLTE/dist/img/default.png')}}" class="user-image" alt="User Image">
            @endif

            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{isset($user) && $user != null ? $user->name : ""}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              @if (isset($user) && $user != null && $user != null && $user->profile->avatar)
                <img src="{{ URL::asset($user->profile->avatar)}}" class="img-circle" alt="User Image">
              @else
                <img src="{{ URL::asset('assets/bower_components/AdminLTE/dist/img/default.png')}}" class="img-circle" alt="User Image">

              @endif

              <p>
                {{isset($user) && $user != null ? $user->name : "Alexander Pierce"}}<br/>
                {{isset($user) && $user != null ? $user->profile->experience : "Web Master"}}
                <small>Member since {{isset($user) && $user != null ? $user->created_at->diffForHumans() : "Nov. 2012"}}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{url('admin/profile', isset($user) && $user != null ? $user->id : '')}}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
