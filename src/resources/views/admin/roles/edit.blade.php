@extends('acl::admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'Users role'!!}
@stop

@section('content')
  <p>{!! link_to_route('admin.roles.index', trans('acl::role.roles-index-index_menu'), [], ['class' => 'btn btn-success btn-flat'])  !!}
  </p>
		<div class="box box-primary"><!-- .box -->
		<div class="box-header with-border"><!-- .box-header -->
			<h3 class="box-title pull-left">
				{{ trans('acl::role.roles-update-roles_update') }}
			</h3>
		</div><!-- /.box-header -->

		<div class="box-body"><!-- .box-body -->
		    @include('acl::admin.roles._form')
		</div><!-- /.box-body -->

		<div class="box-footer"><!-- .box-footer-->
			  {{ trans('acl::role.roles-edit-footer') }} :
				{{$role->id}}
		</div><!-- /.box-footer-->
	</div><!-- /.box -->

@endsection
