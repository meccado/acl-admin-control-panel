<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'name', 'email', 'password',
    ];

    /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $hidden = [
      'password', 'remember_token',
    ];


    public function roles(){
      return $this->belongsToMany(\App\Role::class);
    }

    // User profile relationship
    public function profile()
    {
        return $this->hasOne(\App\Profile::class);
    }

    public function isAdmin()
    {
        return $this->hasRole(['admin', 'super-admin']);
    }

    public function hasRole($role){
      // if (is_string($role)) {
      //   return $this->roles()->lists('name')->contains( $role);
      // }
      if (is_array($role)) {
        return  (!! count(array_intersect($role, $this->roles()->lists('name')->toarray())));
      } else {
        return in_array($role, $this->roles()->lists('name')->toarray());
      }
    }

    public function assign($role){
    if(is_string($role)){
          return $this->roles()->save(Role::where('name','=',$role)->first()
        );
      }
      return $this->roles()->save($role);
    }

    public function removeRole($role){
      return $this->roles()->detach($role);
    }
}
