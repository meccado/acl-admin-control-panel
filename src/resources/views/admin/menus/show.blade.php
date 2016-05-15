@extends('acl::admin.layouts.admin-master')

@section('title')
  {{-- this page title --}}
  {!!(isset($title)) ? $title : 'Show Menu Page'!!}
@stop

@section('styles')

@endsection

@section('content')
  <div class="container">
    <p>
      {!! link_to_route('admin.menus.index', trans('menu.menus-index-index_menu'), [], ['class' => 'btn btn-default btn-flat']) !!}
      {!! link_to_route('admin.menus.edit', trans('menu.menus-edit-btnupdate'), ['id'=>$menu->id], ['class' => 'btn btn-info btn-flat']) !!}
    </p>
    @if($menu != null)
      <div class="box box-primary"><!-- .box -->
        <div class="box-header with-border"><!-- .box-header -->

          <h3 class="box-title pull-left">
            {!!trans('menu.menus-show-menus_show')!!}
          </h3>
        </div><!-- /.box-header -->

        <div class="box-body"><!-- box-body -->
          <div class="row">
            @include('admin.menus._single')
          </div>
          <div class="box-footer"><!-- .box-footer-->
            {{ trans('menu.menus-show-footer') }}
          </div><!-- /.box-footer-->

        </div><!-- /.box -->
      @else
        {{ trans('menu.menus-index-no_entries_found') }}
      @endif
    </div>
  @endsection

  @section('scripts')

  @endsection
