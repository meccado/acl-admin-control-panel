<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">About Me</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
    <p class="text-muted">
      No education added yet.
    </p>
    <hr>
    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
    <p class="text-muted">{{$user->profile->address}}</p>
    <hr>
    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
    <p>
      <span class="label label-danger">No skills added yet.</span>
    </p>
    <hr>
    <strong><i class="fa fa-file-text-o margin-r-5"></i> Biography</strong>
    <p>{{$user->profile->bio}}</p>
  </div><!-- /.box-body -->
</div><!-- /.box -->
