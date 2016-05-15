{!! Form::open(['method' => 'POST',
                'url' => ['admin/assign-role-permissions'],
                'class' => 'form-horizontal'])
!!}

<div class="form-group">
    {!! Form::label('name', trans('acl::user.roles-assign-label'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        <select class="roles form-control" id="role" name="role">
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->label }}</option>
            @endforeach()
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::label('label', trans('acl::user.permissions-assign-label'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        <select class="permissions form-control" id="permissions" name="permissions[]" multiple="multiple">
            @foreach($permissions as $permission)
            <option value="{{ $permission->name }}">{{ $permission->label }}</option>
            @endforeach()
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit(trans('acl::user.user-role-permissions-btnassign'), ['class' => 'btn btn-primary form-control']) !!}

    </div>
</div>
{!! Form::close() !!}
