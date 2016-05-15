@extends('acl::admin.layouts.admin-master')

{{-- Web site Title --}}
@section('title') {!! $title !!} :: @parent @stop

@section('breadcrumb')
  @include('acl::admin.partials.page-breadcrumb',[

  ])
@endsection

{{-- Content --}}
@section('content')
    <div class="row">
      @if (count($menu_items) > 0)
        @foreach(array_chunk($menu_items->items(), 3) as $index => $raw_menu_item)
          @foreach($raw_menu_item as $i => $menu_item)
            <div class="col-lg-3  @if($i > 0) col-lg-offset-1 @endif col-xs-6">
                <div class="box box-danger bg-teal"><!--bg-aqua-->
                    <div class="box-header with-border">
                        <div class="row">
                          <div class="box-title">
                              <div class="col-xs-3">
                                  <i class="{{$menu_item->icon}} fa-3x fa-primary"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <!--div class="huge">{{--count(\App\$menu_item->name::all())--}}</div-->
                                  <div>{{ ucfirst($menu_item->name) ." items" }}!</div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <a href="{{URL::to($menu_item->url)}}">
                        <div class="box-footer">
                            <span class="pull-left">{{ trans("dashboard.view_detail") }}</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
          @endforeach
        @endforeach
      @elseif(Auth::check() && Auth::user()->isAmin())
        <div class="col-lg-3 col-xs-6">
            <div class="box box-primary "><!--bg-aqua-->
                <div class="box-header with-border">
                    <div class="row">
                      <div class="box-title">
                          <div class="col-xs-3">
                              <i class="fa fa-navicon fa-fw fa-3x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{count(\App\Menu::all())}}</div>
                              <div>{{ trans("dashboard.menu_items") }}!</div>
                          </div>
                      </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/menus')}}">
                    <div class="box-footer">
                        <span class="pull-left">{{ trans("dashboard.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      @endif
    </div>
@endsection
