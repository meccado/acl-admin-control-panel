@extends('acl::admin.layouts.admin-master')

@section('title')
  {{-- this page title --}}
  {!!(isset($title)) ? $title : 'User Profile'!!}
@stop

@section('styles')
  {{-- this page specialised styles --}}
  <style>
      .btn-file {
          position: relative;
          overflow: hidden;
      }
      .btn-file input[type=file] {
          position: absolute;
          top: 0;
          right: 0;
          min-width: 100%;
          min-height: 100%;
          font-size: 100px;
          text-align: right;
          filter: alpha(opacity=0);
          opacity: 0;
          outline: none;
          background: white;
          cursor: inherit;
          display: block;
      }
  </style>
@stop

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        @include('acl::admin.profiles._profileimage')
        <!-- About Me Box -->
        @include('acl::admin.profiles._aboutme')
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
            <li><a href="#activity" data-toggle="tab">Activity</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="activity">
              @include('acl::admin.profiles._post')
            </div><!-- /.tab-pane -->

            <div class="active tab-pane" id="timeline">
              @include('acl::admin.profiles._timeline')
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              @include('acl::admin.profiles._form')
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->

@endsection

@section('scripts')
  {{-- this page specialised scripts --}}

@stop
