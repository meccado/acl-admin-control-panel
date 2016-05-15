@extends('acl::admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'User Roles Permission'!!}
@stop

@section('content')
	<div class="box box-primary"><!-- .box -->
		<div class="box-header with-border"><!-- .box-header -->
			<h3 class="box-title pull-left">
				{{ trans('acl::user.user-role-permissions-assign_permission') }}
			</h3>
		</div><!-- /.box-header -->

		<div class="box-body"><!-- .box-body -->
			<div class="row">
		        <div class="col-sm-10 col-sm-offset-2">
		            @include('acl::errors.error')
		        </div>
		    </div>

		    @include('acl::admin.permissions._assign')
		</div><!-- /.box-body -->

		<div class="box-footer"><!-- .box-footer-->
      {{ trans('acl::user.user-role-permissions-assign-footer') }}
		</div><!-- /.box-footer-->
	</div><!-- /.box -->

@endsection
