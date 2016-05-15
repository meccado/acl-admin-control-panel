@extends('acl::admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'User Menus'!!}
@stop

@section('content')
	<div class="box box-primary"><!-- .box -->
		<div class="box-header with-border"><!-- .box-header -->
			<h3 class="box-title pull-left">
				{{ trans('acl::menu.menus-create-menus_create') }}
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
			{{ trans('acl::menu.menus-create-footer') }}
		</div><!-- /.box-footer-->
	</div><!-- /.box -->

@endsection
