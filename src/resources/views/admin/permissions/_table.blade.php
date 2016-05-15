<table id="datatable" class="table table-striped table-hover table-responsive datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>{{ trans('acl::permission.permissions-index-name') }}</th>
      <th>{{ trans('acl::permission.permissions-index-label') }}</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($permissions as $permission)
      <tr>
        <th>{{ $permission->id }}</th>
        <td><a href="{{ url('admin/permissions', $permission->id) }}">{{ $permission->name }}</a></td>
        <td>{{ $permission->label }}</td>
        <td>
          <div class="row">
            <div class="col-md-2 col-sm-offset-1">
              <a href="{{route('admin.permissions.show', ['id'=>$permission->id])}}"
                data-toggle="tooltip"
                data-original-title="{!! trans('permission.permissions-view_tooltip') !!}"
                class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a>
              </div>
              <div class="col-md-2 col-sm-offset-1">
                <a href="{{route('admin.permissions.edit',['id'=>$permission->id])}}"
                  data-toggle="tooltip"
                  data-original-title="{!! trans('permission.permissions-update_tooltip') !!}"
                  class="btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="col-md-2 col-sm-offset-1">
                  {!! Form::open(['route' => ['admin.permissions.destroy', $permission->id],
                    'class' => 'form-horizontal confirm',
                    'role' => 'form', 'method' => 'DELETE']) !!}
                    <button data-toggle="tooltip"
                    data-original-title="{{trans('permission.permissions-delete_tooltip') }}"
                    type="submit" class="btn btn-danger confirm-btn btn-flat">
                    <i class="fa fa-trash-o"></i>
                  </button>
                  {!! Form::close() !!}
                </div>
              </div>
            </td>
          </td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th>
          <button class="btn btn-primary btn-flat form-control" type="button">
            Permissions <span class="badge">{{count($permissions)}}</span>
          </button>
        </th>
      </tr>
    </tfoot>
  </table>
