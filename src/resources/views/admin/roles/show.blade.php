@extends('acl::admin.layouts.admin-master')

@section('title')
  {{-- this page title --}}
  {!!(isset($title)) ? $title : 'View Users'!!}
@stop

@section('styles')

@endsection

@section('content')
    <p>
      {!! link_to_route('admin.roles.index', trans('acl::role.roles-index-index_menu'), [], ['class' => 'btn btn-default btn-flat']) !!}
      {!! link_to_route('admin.roles.edit', trans('acl::role.roles-edit-btnupdate'), ['id'=>$role->id], ['class' => 'btn btn-info btn-flat']) !!}
    </p>
    @if($role != null)
      <div class="box box-primary"><!-- .box -->
        <div class="box-header with-border"><!-- .box-header -->

          <h3 class="box-title pull-left">
            {!!trans('acl::role.roles-update-roles_update')!!}
          </h3>
        </div><!-- /.box-header -->

        <div class="box-body"><!-- box-body -->
          <div class="row">
            @include('admin.roles._single')
          </div>
        </div>

        <div class="box-footer"><!-- .box-footer-->
          {{ trans('acl::role.roles-show-footer') }}
        </div><!-- /.box-footer-->

      </div><!-- /.box -->
    @else
      {{ trans('acl::role.users-show-no_entry_found') }}
    @endif

@endsection

@section('scripts')

@endsection
