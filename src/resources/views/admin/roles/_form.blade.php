@if (isset($role))
    {!! Form::model($role,
            ['route'     => ['admin.roles.update', $role->id],
            'method'     => 'PUT',
            'class'      => 'form-horizontal',
            'files'      => true])
    !!}
@else
    {!! Form::open(['route' =>'admin.roles.store',
           'method' =>'POST',
           'class'  =>'form-horizontal',
           'files'  =>'true',
           ])
    !!}
@endif

    <div class="form-group">
        {!! Form::label('name', trans('acl::role.roles-create-name'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=> trans('acl::role.roles-create-name_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('label', trans('acl::role.roles-create-label'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('label', old('label'), ['class'=>'form-control', 'placeholder'=> trans('acl::role.roles-create-label_placeholder')]) !!}
        </div>
    </div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        @if (isset($role))
            {!! Form::submit(trans('acl::role.roles-edit-btnupdate'), ['class' => 'btn btn-primary btn-flat']) !!}
        @else
            {!! Form::submit(trans('acl::role.roles-create-btncreate'), ['class' => 'btn btn-primary btn-flat']) !!}
        @endif
    </div>
</div>

{!! Form::close() !!}
