<!-- Post -->
<div class="post">
  <div class="user-block">
    @if ($user->profile->avatar)
      <img class="img-circle img-bordered-sm" src="{{ $user->profile->avatar}}" alt="user image">
    @else
      <img class="img-circle img-bordered-sm" src="{{ URL::asset('assets/bower_components/AdminLTE/dist/img/default.png')}}" alt="user image">
    @endif

        <span class="username">
          <a href="#">{{$user->name}}</a>
          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
        </span>
    <span class="description">Shared publicly - {{'date'}}</span>
  </div><!-- /.user-block -->
  <p>
    {{'No posts Shared publicly yet.'}}
  </p>
  <ul class="list-inline">
    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
    </li>
    <li class="pull-right">
      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
        (0)</a></li>
  </ul>

  <input class="form-control input-sm" type="text" placeholder="Type a comment">
</div><!-- /.post -->
<div class="clearfix"></div>
