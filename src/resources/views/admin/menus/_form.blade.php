@if(isset($menu))
  {!! Form::model($menu,
    ['route'     => ['admin.menus.update', $menu->id],
    'method'     => 'PUT',
    'class'      => 'form-horizontal',
    'files'      => true])
    !!}
  @else
    {!! Form::open(['route' =>'admin.menus.store',
      'method' =>'POST',
      'class'  =>'form-horizontal',
      'files'  =>'true',
    ])
    !!}
  @endif

  <fieldset>
    <!-- Name Form Input -->
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      {!!Form::label('name', trans('acl::menu.menus-create-name'), ['class'=>'col-md-3 control-label'])!!}
      <div class="col-md-9">
        {!!Form::text('name', old('name'),array('required','class' => 'form-control ','placeholder'=>trans('acl::menu.menus-create-name_placeholder'),'max-length'=>'120'))!!}
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <!-- Name Form Input -->
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      {!!Form::label('title', trans('acl::menu.menus-create-title'), ['class'=>'col-md-3 control-label'])!!}
      <div class="col-md-9">
        {!!Form::text('title', old('title'),array('required','class' => 'form-control ','placeholder'=>trans('acl::menu.menus-create-title_placeholder'),'max-length'=>'120'))!!}
        @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <!-- Icon Form Input -->
    <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
      {!!Form::label('icon', trans('acl::menu.menus-create-icon'), ['class'=>'col-md-3 control-label'])!!}
      <div class="col-md-9">
        {!!Form::text('icon', old('icon'),array('required','class' => 'form-control ','placeholder'=>trans('acl::menu.menus-create-icon_placeholder'),'max-length'=>'120'))!!}
        @if ($errors->has('icon'))
          <span class="help-block">
            <strong>{{ $errors->first('icon') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <!-- Sort Order Form Input -->
    <div class="form-group{{ $errors->has('sort_order') ? ' has-error' : '' }}">
      {!!Form::label('sort_order', trans('acl::menu.menus-create-sort_order'), ['class'=>'col-md-3 control-label'])!!}
      <div class="col-md-9">
        {!!Form::input('number', 'sort_order', old('sort_order'),array('required','class' => 'form-control ','placeholder'=>trans('acl::menu.menus-create-sort_placeholder'),'max-length'=>'120'))!!}
        @if ($errors->has('sort_order'))
          <span class="help-block">
            <strong>{{ $errors->first('sort_order') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <!-- Parent Category Form Input -->
    <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
      {!!Form::label('parent_id', trans('acl::menu.menus-create-parent_menu'), ['class'=>'col-md-3 control-label'])!!}
      <div class="col-md-9">
        {!! Form::select('parent_id', ['' => '<Select Parent Menu ... >', '0' => 'Parent Menu' ] +  $items, old('parent_id'), ['class' => 'form-control']) !!}
          @if ($errors->has('parent_id'))
            <span class="help-block">
              <strong>{{ $errors->first('parent_id') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <!-- Role Form Input -->
      <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        {!!Form::label('roles', trans('acl::menu.menus-create-role'), ['class'=>'col-md-3 control-label'])!!}
        <div class="col-md-9">
          {!! Form::select('roles[]', $roles, $selected, ['class' => 'form-control', 'multiple' => 'multiple']); !!}
          @if ($errors->has('menus'))
            <span class="help-block">
              <strong>{{ $errors->first('menus') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          @if (isset($menu))
            {!! Form::button('<i class="fa fa-btn fa-save"></i> '.trans('acl::menu.menus-edit-btnupdate'), ['type'=>'submit', 'class' =>'btn btn-primary']) !!}
          @else
            {!! Form::button('<i class="fa fa-btn fa-save"></i> '.trans('acl::menu.menus-create-btncreate'), ['type'=>'submit', 'class' =>'btn btn-primary']) !!}
          @endif
        </div>
      </div>
    </fieldset>
    {!! Form::close() !!}
