<?php

use Illuminate\Database\Seeder;
use App\Permission as Permission;
use App\Role as Role;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
      //Permission::truncate();
      //DB::table('permission_role')->truncate();
      $super_admin_role = Role::where('name','=','super-admin')->first();
      $admin_role = Role::where('name','=','admin')->first();
      $user_role = Role::where('name','=','user')->first();

      $read_user_permission = Permission::create( [
                    'name' => 'user-read',
                    'label' => 'View User Permission',
                ]);
      $create_user_permission = Permission::create( [
                    'name' => 'user-create',
                    'label' => 'Create User Permission',
                ]);
      $update_user_permission = Permission::create( [
                    'name' => 'user-update',
                    'label' => 'Update User Permission',
                ]);
      $delete_user_permission = Permission::create( [
                    'name' => 'user-delete',
                    'label' => 'Delete User Permission',
                ]);

      $super_admin_role->permissions()->attach($read_user_permission);
      $super_admin_role->permissions()->attach($create_user_permission);
      $super_admin_role->permissions()->attach($update_user_permission);
      $super_admin_role->permissions()->attach($delete_user_permission);

      $admin_role->permissions()->attach($update_user_permission);

      $user_role->permissions()->attach($read_user_permission);

    }
}
