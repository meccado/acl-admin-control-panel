<section class="content-header">
    <h1>
        {{ ucwords(Request::segment(2) != null ? Request::segment(2) : "Dashboard")}}
        <small> : Here is our {{ucwords(Request::segment(2) != null ? Request::segment(2) : "Dashboard")}} Page</small>
    </h1>
    <ol class="breadcrumb">
        <li class="@if(Request::is('*/admin'))
                      {{'active'}}
                    @endif">
            <a href="{{ url('/admin') }}">
                <i class="fa fa-dashboard"></i>{{ucwords(Request::segment(1))}}
            </a>
        </li>
        <li class="@if(Request::is('*/admin/*'))
                      {{'active'}}
                    @endif">
            <a href="{{Request::url()}}">{{ucwords(Request::segment(2) != null ? Request::segment(2) : "Dashboard")}}</a>
        </li>
        <li class="@if(Request::is('*/admin'))
                      {{'active'}}
                  @endif">{{(isset($title)) ? $title : 'index'}}
        </li>
    </ol>
</section>
