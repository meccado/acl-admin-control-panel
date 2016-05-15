@extends('acl::auth.layouts.master')

@section('styles')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower_components/AdminLTE/plugins/iCheck/square/blue.css')}}">
@endsection

@section('content')
  <div class="register-box">
    <div class="register-logo">
      <a href="{{ url('register') }}"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Register a new membership</p>

      {{Form::open(['class'   =>  'form-horizontal',
                        'role'    =>  'form',
                        'method'  =>  'POST',
                        'url'     =>  'register',
                        'files'   =>  true
                    ])
      }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
          {{Form::text('name',   old('name'), ['class'=>'form-control', 'placeholder'=>'Full name']) }}
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
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
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
          {{Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Retype password']) }}
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          @if ($errors->has('password_confirmation'))
              <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
          @endif
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                {{Form::checkbox('terms', old('terms'))}} I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            {{ Form::button(
                '<span class="fa fa-btn fa-pencil pull-right"></span>Register',[
                  'class'=>'btn btn-primary btn-block btn-flat',
                  'type'=>'submit'
                ])
            }}
          </div>
          <!-- /.col -->
        </div>
      {{ Form::close() }}

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
          Google+</a>
      </div>

      <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
    </div><!-- /.form-box -->
  </div>  <!-- /.register-box -->
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
