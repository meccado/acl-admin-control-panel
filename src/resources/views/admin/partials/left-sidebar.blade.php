<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ URL::asset('assets/bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{\Auth::user() != null ? \Auth::user()->name : "Alexander Pierce"}}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">DASHBOARD MENU </li>
      @foreach($menus as $index => $menu)
        @if(count($menu->children) === 0)
          <li class="@if(Request::is($menu->url) == Request::path()) {{'active'}} @endif">
            <a href="{{ url($menu->url) }}"><i class="{{$menu->icon}}"></i>{{$menu->title}}
              <span class="sr-only">(current)</span>
            </a>
          </li>
        @else
          <li class="treeview @if(Request::is($menu->url) == Request::path()) {{'active'}} @endif">
            <a href="{{url($menu->url)}}"><i class="{{$menu->icon}}"></i> <span>{{$menu->title}}</span> <i class="fa fa-angle-left fa-fw pull-right"></i></a>
            @foreach($menu->children as $index => $sub_menu)
              <ul class="treeview-menu">
                <li class="@if(Request::is($menu->url) == Request::path()) {{'active'}} @endif">
                  <a href="{{url($sub_menu->url)}}"><i class="{{$sub_menu->icon}}"></i>{{$sub_menu->title}}</a></li>
                </ul>
              @endforeach
            </li>
          @endif
        @endforeach
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
