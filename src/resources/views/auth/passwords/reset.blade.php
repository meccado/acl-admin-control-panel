@extends('acl::auth.layouts.master')

@section('content')
    <div class="register-box">
      <div class="register-logo">
        <a href="{{ url('login') }}"><b>Admin</b>LTE</a>
      </div>

        <div class="register-box-body">
            <p class="login-box-msg">Reset password to start your session</p>
              {{Form::open(['class'   =>  'form-horizontal',
                            'role'    =>  'form',
                            'method'  =>  'POST',
                            'url'     =>  'password/reset',
                            'files'   =>  true
                        ])
              }}
                   {{ Form::hidden('token', $token) }}
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                      {{Form::email('email',   $email, ['class'=>'form-control', 'placeholder'=>'E-Mail Address']) }}
                      <span class="fa fa-envelope form-control-feedback"></span>
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                      {{Form::password('password',  ['class'=>'form-control', 'placeholder'=>'Password']) }}
                      <span class="fa fa-lock form-control-feedback"></span>
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                      {{Form::password('password_confirmation',  ['class'=>'form-control', 'placeholder'=>'Confirm Password']) }}
                      <span class="fa fa-sign-in form-control-feedback"></span>
                      @if ($errors->has('password_confirmation'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="row">
                      <div class="col-xs-8 col-xs-offset-2">
                        {{ Form::button(
                            '<span class="fa fa-btn fa-refresh pull-right"></span>Reset Password',[
                              'class'=>'btn btn-primary btn-block btn-flat',
                              'type'=>'submit'
                            ])
                        }}
                      </div><!-- /.col -->
                  </div>
              {{ Form::close() }}
        </div>
    </div>

@endsection
