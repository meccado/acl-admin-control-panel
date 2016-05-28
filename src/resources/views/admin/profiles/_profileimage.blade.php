<div class="box box-primary">
  <div class="box-body box-profile">
    @if ($user->profile->avatar != null)
      <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset($user->profile->avatar)}}" alt="User profile picture">
    @else
      <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('assets/bower_components/AdminLTE/dist/img/default.png')}}" alt="User profile picture">
    @endif
    {!! Form::open(['method' => 'PATCH',
      'route'=>['profile.avatar', $user->id],
      'class' => 'form-horizontal',
      'files'=>true])
      !!}
      <div class="clearfix"></div>
      <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
        <div class="col-sm-offset-4 ">

          <span class="btn btn-primary btn-file btn-flat">
            Browse ... <input type="file" name="avatar" class="form-control">
          </span>
          {{-- Form::file('avatar','',['id'=>'','class'=>'btn btn-default btn-file', 'style'=>'display: none' ]) --}}
          @if ($errors->has('avatar'))
            <span class="help-block">
              <strong>{{ $errors->first ('avatar') }}</strong>
            </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          {!! Form::submit('Upload', ['id'=>'','class'=>'btn btn-primary btn-block']) !!}
        </div>
      </div>
      {!! Form::close() !!}

      <h3 class="profile-username text-center">{{$user->name != null ? $user->name : ""}}</h3>
      <p class="text-muted text-center">{{$user->profile->experience != null ? $user->profile->experience : "Software Engineer"}}</p>
      <!--a href="#" class="btn btn-primary btn-block"><b>Follow</b></a-->
    </div><!-- /.box-body -->
  </div><!-- /.box -->
