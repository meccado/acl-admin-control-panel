<table id="datatable" class="table table-striped table-hover table-responsive datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>{{ trans('acl::role.roles-index-name') }}</th>
      <th>{{ trans('acl::role.roles-index-label') }}</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($roles as $role)
      <tr>
        <th>{{ $role->id }}</th>
        <td>{{ $role->name }}</td>
        <td>{{ $role->label }}</td>
        <td>
          <div class="row">
            <div class="col-md-2">
              <a href="{{route('admin.roles.show', ['id'=>$role->id])}}"
                data-toggle="tooltip"
                data-original-title="{!! trans('acl::role.roles-view_tooltip') !!}"
                class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a>
              </div>
              <div class="col-md-2 col-sm-offset-1">
                <a href="{{route('admin.roles.edit',['id'=>$role->id])}}"
                  data-toggle="tooltip"
                  data-original-title="{!! trans('acl::role.roles-update_tooltip') !!}"
                  class="btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="col-md-2 col-sm-offset-1">
                  {!! Form::open(['route' => ['admin.roles.destroy', $role->id],
                    'class' => 'form-horizontal confirm',
                    'role' => 'form', 'method' => 'DELETE']) !!}
                    <button data-toggle="tooltip"
                    data-original-title="{{trans('acl::role.roles-delete_tooltip') }}"
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
          <button class="btn btn-primary btn-flat" type="button">
            Roles <span class="badge">{{count($roles)}}</span>
          </button>
        </th>
      </tr>
    </tfoot>
  </table>
