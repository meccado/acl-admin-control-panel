<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = ['user_id', 'avatar', 'file_name', 'bio', 'gender', 'experience', 'address', 'city', 'state', 'zip'];


  public function user()
  {
      return $this->belongsTo(\App\User::class);
  }
}
