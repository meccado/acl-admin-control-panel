@if (isset($permission))
    {!! Form::model($permission,
            ['route'     => ['admin.permissions.update', $permission->id],
            'method'     => 'PUT',
            'class'      => 'form-horizontal',
            'files'      => true])
    !!}
@else
    {!! Form::open(['route' =>'admin.permissions.store',
           'method' =>'POST',
           'class'  =>'form-horizontal',
           'files'  =>'true',
           ])
    !!}
@endif

    <div class="form-group">
        {!! Form::label('name', trans('acl::permission.permissions-create-name'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=> trans('acl::permission.permissions-create-name_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('label', trans('acl::permission.permissions-create-label'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('label', old('label'), ['class'=>'form-control', 'placeholder'=> trans('acl::permission.permissions-create-label_placeholder')]) !!}
        </div>
    </div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        @if (isset($permission))
            {!! Form::submit(trans('acl::permission.permissions-edit-btnupdate'), ['class' => 'btn btn-primary btn-flat form-control']) !!}
        @else
            {!! Form::submit(trans('acl::permission.permissions-create-btncreate'), ['class' => 'btn btn-primary btn-flat form-control']) !!}
        @endif
    </div>
</div>

{!! Form::close() !!}
