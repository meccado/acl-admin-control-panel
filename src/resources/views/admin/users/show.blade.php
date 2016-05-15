@extends('acl::admin.layouts.admin-master')

@section('title')
  {{-- this page title --}}
  {!!(isset($title)) ? $title : 'View Users'!!}
@stop

@section('styles')

@endsection

@section('content')
    <p>
      {!! link_to_route('admin.users.index', trans('acl::user.users-index-index_menu'), [], ['class' => 'btn btn-default btn-flat']) !!}
      {!! link_to_route('admin.users.edit', trans('acl::user.users-edit-btnupdate'), ['id'=>$user->id], ['class' => 'btn btn-info btn-flat']) !!}
    </p>
    @if($user != null)
      <div class="box box-primary"><!-- .box -->
        <div class="box-header with-border"><!-- .box-header -->

          <h3 class="box-title pull-left">
            {!!trans('acl::user.users-show-users_show')!!}
          </h3>
        </div><!-- /.box-header -->

        <div class="box-body"><!-- box-body -->
          <div class="row">
            @include('admin.users._single')
          </div>
        </div>

        <div class="box-footer"><!-- .box-footer-->
          {{ trans('acl::user.users-show-footer') }}
        </div><!-- /.box-footer-->

      </div><!-- /.box -->
    @else
      {{ trans('acl::user.users-show-no_entry_found') }}
    @endif

@endsection

@section('scripts')

@endsection
