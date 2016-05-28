@if(isset($user->profile))
  {!! Form::model($user->profile, ['method' => 'PATCH',
    'route' => ['profile.update', $user->id],//profile->id
    'class'=>'form-horizontal'])
    !!}
@endif

  {{--'user_id', 'avatar', 'bio', 'gender', 'experience', 'address', 'city', 'state', 'zip'--}}
  <!-- Bio Field -->
  <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
    {!! Form::label('bio', trans('acl::profile.profiles-create-bio'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::textarea('bio', old($user->profile->bio), ['class' => 'form-control', 'placeholder'=> trans('acl::profile.profiles-create-bio_placeholder')]) !!}
      @if ($errors->has('bio'))
        <span class="help-block">
          <strong>{{ $errors->first('bio') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
    {!! Form::label('experience', trans('acl::profile.profiles-create-experience'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('experience', old($user->profile->experience), ['class'=>'form-control', 'placeholder'=> trans('acl::profile.profiles-create-experience_placeholder')]) !!}
      @if ($errors->has('experience'))
        <span class="help-block">
          <strong>{{ $errors->first('experience') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <!-- Location Field -->
  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', trans('acl::profile.profiles-create-address'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('address', old($user->profile->address), ['class' => 'form-control', 'placeholder'=> trans('acl::profile.profiles-create-address_placeholder')]) !!}
      @if ($errors->has('address'))
        <span class="help-block">
          <strong>{{ $errors->first('address') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', trans('acl::profile.profiles-create-city'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('city', old($user->profile->city), ['class'=>'form-control', 'placeholder'=> trans('acl::profile.profiles-create-city_placeholder')]) !!}
      @if ($errors->has('city'))
        <span class="help-block">
          <strong>{{ $errors->first('city') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    {!! Form::label('state', trans('acl::profile.profiles-create-state'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('state', old($user->profile->state), ['class'=>'form-control', 'placeholder'=> trans('acl::profile.profiles-create-state_placeholder')]) !!}
      @if ($errors->has('state'))
        <span class="help-block">
          <strong>{{ $errors->first('state') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
    {!! Form::label('zip', trans('acl::profile.profiles-create-zip'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('zip', old($user->profile->zip), ['class'=>'form-control', 'placeholder'=> trans('acl::profile.profiles-create-zip_placeholder')]) !!}
      @if ($errors->has('zip'))
        <span class="help-block">
          <strong>{{ $errors->first('zip') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
      {!! Form::submit(trans('acl::profile.profiles-edit-btnupdate'), ['class' => 'btn btn-primary btn-flat form-control']) !!}
    </div>
  </div>

  {!! Form::close() !!}
