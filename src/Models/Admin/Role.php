<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Cviebrock\EloquentSluggable\SluggableInterface;
//use Cviebrock\EloquentSluggable\SluggableTrait;

class Role extends Model //implements SluggableInterface
{
  // use SluggableTrait;
  //
  // protected $sluggable = [
  //     'build_from' => 'name',
  //     'save_to'    => 'slug',
  //     'unique'     => true,
  // ];

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'label',
  ];

  /*
  17  |--------------------------------------------------------------------------
  18  | Relationship Methods
  19  |--------------------------------------------------------------------------
  20  */

  /**
  * many-to-many relationship method.
  *
  * @return QueryBuilder
  */
  public function users()
  {
    return $this->belongsToMany(\App\User::class);
  }

  public function menus()
  {
    return $this->belongsToMany(\App\Menu::class, 'menu_role', 'role_id', 'menu_id');
  }

  public function permissions()
  {
    return $this->belongsToMany(\App\Permission::class);
  }

  public function assign(Permission $permission)
  {
    return $this->permissions()->save($permission);
  }

  /**
  * Checks if the role has the given permission.
  *
  * @param  string $permission
  * @return bool
  */
  public function can($permission)
  {
    if (is_array($permission)) {
      return (!! (count($permission) == count(array_intersect($this->getPermissions()->lists('name')->toarray(), $permission))));
    } else {
      return in_array($permission, $this->getPermissions()->lists('name')->toarray());
    }
  }

  /**
  * Check if the role has at least one of the given permissions
  *
  * @param  array $permission
  * @return bool
  */
  public function canAtLeast(array $permission = array())
  {
    return (!! (count(array_intersect($this->getPermissions()->lists('name')->toarray(), $permission)) > 0));
  }
}
