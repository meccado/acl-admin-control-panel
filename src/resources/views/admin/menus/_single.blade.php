<div class="menu-details"><!--menu-details-->
  <div class="col-sm-4">
    <div class="menu-information"><!--/menu-information-->
      @if(isset($menu))
        <h3>{{$menu->name}}</h3>
        <p><strong>Title: {{$menu->title}}</strong></p>
        <span>
          <p><strong>Parent Menu: ({{$menu->parent_id}})</strong></p>
          <p><strong>Sort Order: ({{$menu->sort_order}})</strong></p>
        </span>
      @endif
    </div><!--/menu-information-->
  </div>
  <div class="col-sm-8">
    <div class="view-menu">
      @if(isset($menu))
        <span>
          <label>Required Roles For Menu:</label>
          @foreach($menu->roles as $index => $role)
            <li>{{$role->name}}</li>
          @endforeach
        </span>
      @endif
    </div>
  </div>

</div><!--/menu-details-->
