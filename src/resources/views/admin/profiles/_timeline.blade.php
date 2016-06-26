<!-- The timeline -->
<ul class="timeline timeline-inverse">

  <!-- timeline time label -->
  <li class="time-label">
        <span class="bg-green">
          {{ $user->profile->updated_at != null ? $user->profile->updated_at->format('M j  Y , g:ia') : $user->profile->created_at->format('M j  Y , g:ia')}}
        </span>
  </li><!-- /.timeline-label -->

  <!-- timeline item -->
  <li>
    <i class="fa fa-camera bg-purple"></i>
    <div class="timeline-item">
      <span class="time"><i class="fa fa-clock-o"></i> {{ $user->profile->updated_at != null ? $user->profile->updated_at->diffForHumans() : $user->profile->created_at->diffForHumans()}}</span>
      <h3 class="timeline-header"><a href="#">{{$user->name}}</a> {{$user->profile->avatar != null ?'uploaded new profile photos' : 'updated profile ' }} </h3>
      <div class="timeline-body">
        @if ($user->profile->avatar)
            <img src="{{ URL::asset($user->profile->avatar)}}" width="150" height="100" alt="{{$user->profile->file_name}}" class="margin">
        @endif
      </div>
    </div>
  </li> <!-- END timeline item -->

  <!-- timeline time label -->
  <li class="time-label">
        <span class="bg-blue">
          {{ $user->created_at->format('M j  Y , g:ia')}}
        </span>
  </li><!-- /.timeline-label -->

  <!-- timeline item -->
  <li>
    <i class="fa fa-user bg-aqua"></i>
    <div class="timeline-item">
      <span class="time"><i class="fa fa-clock-o"></i>{{ $user->created_at->diffForHumans()}}</span>
      <h3 class="timeline-header no-border"><a href="#">{{$user->name}}</a>, became a member.
      </h3>
    </div>
  </li><!-- END timeline item -->

  <li>
    <i class="fa fa-clock-o bg-gray"></i>
  </li>
</ul>
