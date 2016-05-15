@extends('acl::auth.layouts.master')

@section('styles')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower_components/AdminLTE/plugins/iCheck/square/blue.css')}}">
@endsection

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('login') }}"><b>Admin</b>LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>


      {{Form::open(['class'   =>  'form-horizontal',
                      'role'    =>  'form',
                      'method'  =>  'POST',
                      'url'     =>  'login',
                      'files'   =>  true
                  ])
      }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
          {{Form::email('email',   old('email'), ['class'=>'form-control', 'placeholder'=>'Email']) }}
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
          {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                {{Form::checkbox('remember', old('remember'))}} Remember Me
              </label>
            </div>
          </div><!-- /.col -->
          <div class="col-xs-4">
            {{ Form::button(
                '<span class="fa fa-btn fa-sign-in pull-right"></span>Sign In',[
                  'class'=>'btn btn-primary btn-block btn-flat',
                  'type'=>'submit'
                ])
            }}
          </div><!-- /.col -->
        </div>
      {{ Form::close() }}

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div><!-- /.social-auth-links -->

      <a href="{{ url('password/reset') }}">I forgot my password</a><br>
      <a href="{{ url('register') }}" class="text-center">Register a new membership</a>

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
@endsection

@section('scripts')
  <!-- iCheck -->
  <script src="{{ URL::asset('assets/bower_components/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
@endsection
