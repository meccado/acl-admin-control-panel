<?php

use Illuminate\Database\Seeder;

use App\User as User;
use App\Profile as Profile;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

      //User::truncate();
      $user_super = User::create( [
          'email' => 'super@domain.com' ,
          'password' => Hash::make( 'password' ) ,
          'name' => 'Super Administrator' ,
      ] );
      //create Blank profile
      $profile = Profile::create([
        'user_id' => $user_super->id,
        'bio'     => '',
      ]);
      $profile->save();
      $user_admin = User::create( [
          'email' => 'admin@domain.com' ,
          'password' => Hash::make( 'password' ) ,
          'name' => 'Administrator' ,
      ] );
      //create Blank profile
      $profile = Profile::create([
        'user_id' => $user_admin->id,
        'bio'     => '',
      ]);
      $profile->save();

      $user_user = User::create( [
          'email' => 'user@gmail.com' ,
          'password' => Hash::make( 'password' ) ,
          'name' => 'General User' ,
      ] );
      //create Blank profile
      $profile = Profile::create([
        'user_id' => $user_user->id,
        'bio'     => '',
      ]);
      $profile->save();
    }
}
