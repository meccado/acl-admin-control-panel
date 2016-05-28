@extends('acl::admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'User Profile'!!}
@stop

@section('content')
  <p>
    {!! link_to_route('admin.profiles.index', trans('acl::profile.profiles-index-index_menu'), [], ['class' => 'btn btn-default btn-flat'])!!}
</p>
	<div class="box box-primary"><!-- .box -->
		<div class="box-header with-border"><!-- .box-header -->
			<h3 class="box-title pull-left">
				{{ trans('acl::profile.profiles-create-profiles_create') }}
			</h3>
		</div><!-- /.box-header -->

		<div class="box-body"><!-- .box-body -->
		    @include('acl::admin.profiles._form')
		</div><!-- /.box-body -->

		<div class="box-footer"><!-- .box-footer-->
			{{ trans('acl::profile.profiles-create-footer') }}
		</div><!-- /.box-footer-->
	</div><!-- /.box -->

@endsection
