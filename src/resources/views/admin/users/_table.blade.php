<table id="datatable" class="table table-striped table-hover table-responsive datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>{{ trans('acl::user.users-index-name') }}</th>
      <th>{{ trans('acl::user.users-index-email') }}</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($users as $user)
      <tr>
        <th>{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <div class="row">
            <div class="col-md-2">
              <a href="{{route('admin.users.show', ['id'=>$user->id])}}"
                data-toggle="tooltip"
                data-original-title="{!! trans('acl::user.users-view_tooltip') !!}"
                class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a>
              </div>
              <div class="col-md-2  col-sm-offset-1">
                <a href="{{route('admin.users.edit',['id'=>$user->id])}}"
                  data-toggle="tooltip"
                  data-original-title="{!! trans('acl::user.users-update_tooltip') !!}"
                  class="btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="col-md-2 col-sm-offset-1">
                  {!! Form::open(['route' => ['admin.users.destroy', $user->id],
                    'class' => 'form-horizontal confirm',
                    'role' => 'form', 'method' => 'DELETE']) !!}
                    <button data-toggle="tooltip"
                    data-original-title="{{trans('acl::user.users-delete_tooltip') }}"
                    type="submit" class="btn btn-danger confirm-btn btn-flat">
                    <i class="fa fa-trash-o"></i>
                  </button>
                  {!! Form::close() !!}
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th></th>
          <th>
            <button class="btn btn-primary btn-flat" type="button">
              Users <span class="badge">{{count($users)}}</span>
            </button>
          </th>
        </tr>
      </tfoot>
    </table>
