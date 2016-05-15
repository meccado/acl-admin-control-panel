<?php

use Illuminate\Database\Seeder;

use App\User as User;
use App\Role as Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        //Role::truncate();
        //DB::table('role_user')->truncate();
        $super_admin_user = User::where('email','=','super@domain.com')->first();
        $super_admin_role = Role::create( [
                      'name' => 'super-admin',
                      'label' => 'Super Administrator',
                  ]);
        $super_admin_user->roles()->attach($super_admin_role);

        $admin_user = User::where('email','=','admin@domain.com')->first();
        $admin_role = Role::create( [
                    'name' => 'admin',
                    'label' => 'Administrator',
                ]);
        $admin_user->roles()->attach($admin_role);

        $general_user = User::where('email','=','tsw603gp@gmail.com')->first();
        $user_role = Role::create( [
                    'name' => 'user',
                    'label' => 'User',
                ]);
        $general_user->roles()->attach($user_role);
    }
}
