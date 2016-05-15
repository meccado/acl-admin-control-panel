<?php

use Illuminate\Database\Seeder;

use App\User as User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

      //User::truncate();
      User::create( [
          'email' => 'super@domain.com' ,
          'password' => Hash::make( 'password' ) ,
          'name' => 'Super Administrator' ,
      ] );
      User::create( [
          'email' => 'admin@domain.com' ,
          'password' => Hash::make( 'password' ) ,
          'name' => 'Administrator' ,
      ] );
      User::create( [
          'email' => 'tsw603gp@gmail.com' ,
          'password' => Hash::make( 'password' ) ,
          'name' => 'Moeketsi Mokoena' ,
      ] );
    }
}
