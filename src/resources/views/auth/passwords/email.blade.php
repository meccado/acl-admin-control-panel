@extends('acl::auth.layouts.master')

@section('styles')

@endsection

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Reset password to resume your session</p>
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      {{Form::open(['class'   =>  'form-horizontal',
                    'role'    =>  'form',
                    'method'  =>  'POST',
                    'url'     =>  'password/email',
                    'files'   =>  true
                ])
      }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            {{Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'E-Mail Address']) }}
          <span class="fa fa-envelope form-control-feedback"></span>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
              {{ Form::button(
                  '<span class="fa fa-btn fa-envelope pull-right"></span>Send Password Reset Link',[
                    'class'=>'btn btn-primary btn-block btn-flat',
                    'type'=>'submit'
                  ])
              }}
          </div><!-- /.col -->
        </div>
      {{ Form::close() }}

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
@endsection

@section('scripts')

@endsection
