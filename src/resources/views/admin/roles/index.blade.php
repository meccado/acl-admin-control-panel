@extends('acl::admin.layouts.admin-master')


@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'Users role'!!}
@stop

@section('styles')
   {{-- this page specialised styles --}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('assets/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content')

    <p>{!! link_to_route('admin.roles.create', trans('acl::role.roles-create-create_menu'), [], ['class' => 'btn btn-success btn-flat'])
    !!}</p>

    @if($roles->count() > 0)
        <div class="box box-primary"><!-- .box -->
            <div class="box-header with-border"><!-- .box-header -->

                <h3 class="box-title pull-left">
                    {{ trans('acl::role.roles-index-roles_list') }}
                </h3>
            </div><!-- /.box-header -->

            <div class="box-body"><!-- box-body -->
                @include('acl::admin.roles._table')
            </div><!-- /.box-body -->

            <div class="box-footer"><!-- .box-footer-->
              {{ trans('acl::role.roles-index-footer') }}
            </div><!-- /.box-footer-->

        </div><!-- /.box -->

    @else
        {{ trans('acl::role.roles-index-no_entries_found') }}
    @endif

@endsection

@section('scripts')
   {{-- this page specialised scripts --}}
   <!-- DataTables -->
    <script src="{{ URL::asset('assets/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
     $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();
     });
   </script>
@stop
