@extends('acl::admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'Users'!!}
@stop

@section('content')
  <p>
      {!! link_to_route('admin.users.index', trans('acl::user.users-index-index_menu'), [], ['class' => 'btn btn-default btn-flat']) !!}
  </p>
		<div class="box box-primary"><!-- .box -->
		<div class="box-header with-border"><!-- .box-header -->
			<h3 class="box-title pull-left">
				{{ trans('acl::user.users-update-users_update') }}
			</h3>
		</div><!-- /.box-header -->

		<div class="box-body"><!-- .box-body -->
		    @include('acl::admin.users._form')
		</div><!-- /.box-body -->

		<div class="box-footer"><!-- .box-footer-->
			  {{ trans('acl::user.users-edit-footer') }} :
				{{$user->id}}
		</div><!-- /.box-footer-->
	</div><!-- /.box -->

@endsection

@section('scripts')
  <script type="text/javascript">
      $(document).ready(function(){
          $('#password').val("{{old('password')}}");
      });
  </script>
@endsection
