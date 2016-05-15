<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $guarded = ['id'];
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'title', 'parent_id', 'icon', 'sort_order', 'url',
  ];

  public function roles()
  {
    return $this->belongsToMany(\App\Role::class, 'menu_role', 'menu_id', 'role_id');
  }

  public function assign($role){
    if(is_string($role)){
      return $this->roles()->save(\App\Role::whereName($role)->findOrFail());
    }
    return $this->roles()->save($role);
  }

  public function removeRole($role)
  {
    return $this->roles()->detach($role);
  }

  public function parent()
  {
    return $this->belongsTo(\App\Menu::class, 'parent_id');
  }

  public function children()
  {
    return $this->hasMany(\App\Menu::class, 'parent_id');
  }
}
