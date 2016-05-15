@if (isset($user))
    {!! Form::model($user,
            ['route'     => ['admin.users.update', $user->id],
            'method'     => 'PUT',
            'class'      => 'form-horizontal',
            'files'      => true])
    !!}
@else
    {!! Form::open(['route' =>'admin.users.store',
           'method' =>'POST',
           'class'  =>'form-horizontal',
           'files'  =>'true',
           ])
    !!}
@endif

<div class="form-group">
    {!! Form::label('name', trans('acl::user.users-create-name'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=> trans('acl::user.users-create-name_placeholder')]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', trans('acl::user.users-create-email'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=> trans('acl::user.users-create-email_placeholder')]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', trans('acl::user.users-create-password'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::password('password',  ['class'=>'form-control', 'placeholder'=> trans('acl::user.users-create-password_placeholder')]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role_id', trans('acl::user.users-create-role'), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('role_id', $roles, old('role_id'), ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        @if (isset($user))
            {!! Form::submit(trans('acl::user.users-edit-btnupdate'), ['class' => 'btn btn-primary btn-flat']) !!}
        @else
            {!! Form::submit(trans('acl::user.users-create-btncreate'), ['class' => 'btn btn-primary ']) !!}
        @endif
    </div>
</div>

{!! Form::close() !!}
