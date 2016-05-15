@extends('acl::admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'User Roles Permission'!!}
@stop

@section('styles')
   {{-- this page specialised styles --}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('assets/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content')

    <p>{!! link_to_route('admin.permissions.create', trans('acl::permission.permissions-create-create_menu'), [], ['class' => 'btn btn-success btn-flat'])
    !!}</p>

    @if($permissions->count() > 0)
        <div class="box box-primary"><!-- .box -->
            <div class="box-header with-border"><!-- .box-header -->

                <h3 class="box-title pull-left">
                    {{ trans('acl::permission.permissions-index-permissions_list') }}
                </h3>
            </div><!-- /.box-header -->

            <div class="box-body"><!-- box-body -->
                @include('acl::admin.permissions._table')
            </div><!-- /.box-body -->

            <div class="box-footer"><!-- .box-footer-->
              {{ trans('acl::permission.permissions-index-footer') }}
            </div><!-- /.box-footer-->

        </div><!-- /.box -->

    @else
        {{ trans('acl::permission.permissions-index-no_entries_found') }}
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
