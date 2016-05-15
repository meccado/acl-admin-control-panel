<div class="col-md-8">
  <h3>{{$user->name}} <small> :: {{$user->email}}</small></h3>
  <ul>
    @foreach($user->roles as $index => $role)
      <li class="lead"> {{$role->name}} ({{$role->label}})</li>
      <ul>
        @foreach($role->permissions as $id => $permission)
          <li> {{$permission->name}} ({{$permission->label}})</li>
        @endforeach
      </ul>
    @endforeach
  </ul>
</div>
