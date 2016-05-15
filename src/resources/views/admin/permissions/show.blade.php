@extends('acl::admin.layouts.admin-master')

@section('title')
  {{-- this page title --}}
  {!!(isset($title)) ? $title : 'View Users'!!}
@stop

@section('styles')

@endsection

@section('content')
    <p>
      {!! link_to_route('admin.permissions.index', trans('acl::permission.permissions-index-index_menu'), [], ['class' => 'btn btn-default btn-flat']) !!}
      {!! link_to_route('admin.permissions.edit', trans('acl::permission.permissions-edit-btnupdate'), ['id'=>$permission->id], ['class' => 'btn btn-info btn-flat']) !!}
    </p>
    @if($permission != null)
      <div class="box box-primary"><!-- .box -->
        <div class="box-header with-border"><!-- .box-header -->

          <h3 class="box-title pull-left">
            {!!trans('acl::permission.permissions-update-permissions_update')!!}
          </h3>
        </div><!-- /.box-header -->

        <div class="box-body"><!-- box-body -->
          <div class="row">
            @include('admin.permissions._single')
          </div>
        </div>

        <div class="box-footer"><!-- .box-footer-->
          {{ trans('acl::permission.permissions-show-footer') }}
        </div><!-- /.box-footer-->

      </div><!-- /.box -->
    @else
      {{ trans('acl::permission.users-show-no_entry_found') }}
    @endif

@endsection

@section('scripts')

@endsection
