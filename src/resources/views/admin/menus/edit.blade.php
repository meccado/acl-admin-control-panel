@extends('acl::admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'Edit Menu Details Item'!!}
@stop

@section('content')
  <p>
    {!! link_to_route('admin.menus.index', trans('menu.menus-index-index_menu'), [], ['class' => 'btn btn-default btn-flat']) !!}
  </p>
		<div class="box box-primary"><!-- .box -->
		<div class="box-header with-border"><!-- .box-header -->
			<h3 class="box-title pull-left">
				{{ trans('acl::menu.menus-update-menus_update') }}
			</h3>
		</div><!-- /.box-header -->

		<div class="box-body"><!-- .box-body -->
			<div class="row">
		        <div class="col-sm-10 col-sm-offset-2">
		            @include('acl::errors.error')
		        </div>
		    </div>

		    @include('acl::admin.menus._form')
		</div><!-- /.box-body -->

		<div class="box-footer"><!-- .box-footer-->
			{{ trans('acl::menu.menus-edit-footer') }} :
			{{$menu->id}}
		</div><!-- /.box-footer-->
	</div><!-- /.box -->

@endsection
