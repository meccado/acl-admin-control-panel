<div class="col-md-8">
  <h3>User  <small>roles</small></h3>

  <small class="lead"> {{$role->name}} ({{$role->label}})</small>
  <ul>
    @foreach($role->permissions as $id => $permission)
      <li> {{$permission->name}} ({{$permission->label}})</li>
    @endforeach
  </ul>
</div>
