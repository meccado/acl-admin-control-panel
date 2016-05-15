<table id="datatable" class="table table-striped table-hover table-responsive datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>{{ trans('acl::menu.menus-index-name') }}</th>
      <th>{{ trans('acl::menu.menus-index-parent_menu') }}</th>
      <th>{{ trans('acl::menu.menus-index-sort_order') }}</th>
      <th>{{ trans('acl::menu.menus-index-role') }}</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($items as $item)
      <tr>
        <tr><th>{{$item->id}}</th>
          <td><a href="{{ url('admin/menus', $item->id) }}">{{ $item->name }}</a>
            <span class="badge progress-bar-success pull-right">
              sub menu item(s) :: ({{$item->children != null ? count($item->children) : 0}})
            </span>
          </td>
          <td>{{ $item->parent_id }}</td>
          <td>{{ $item->sort_order }}</td>
          <td>
            @foreach($item->roles as $index => $role)
              {{ $role->name }},
            @endforeach
          </td>
          <td>
            <div class="row">
              <div class="col-md-1">
                <a href="{{route('admin.menus.show', ['id'=>$item->id])}}"
                  data-toggle="tooltip"
                  data-original-title="{!! trans('menu.menus-view_tooltip') !!}"
                  class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a>
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <a href="{{route('admin.menus.edit',['id'=>$item->id])}}"
                    data-toggle="tooltip"
                    data-original-title="{!! trans('menu.menus-update_tooltip') !!}"
                    class="btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                  </div>
                  <div class="col-md-2 col-md-offset-1">
                    {!! Form::open(['route' => ['admin.menus.destroy', $item->id],
                      'class' => 'form-horizontal confirm',
                      'role' => 'form', 'method' => 'DELETE']) !!}
                      <button data-toggle="tooltip"
                      data-original-title="{{trans('menu.menus-delete_tooltip') }}"
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
        <tr></th>
          <th></th>
          <th>
            <button class="btn btn-primary btn-flat form-control" type="button">
              Total Menu(s) : <span class="badge">{{count($items)}}</span>
            </button>
          </th>
        </tr>
      </tfoot>
    </table>
