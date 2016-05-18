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

      $read_menu_permission = Permission::create( [
                    'name' => 'menu-read',
                    'label' => 'View Menu Permission',
                ]);
      $create_menu_permission = Permission::create( [
                    'name' => 'menu-create',
                    'label' => 'Create Menu Permission',
                ]);
      $update_menu_permission = Permission::create( [
                    'name' => 'menu-update',
                    'label' => 'Update Menu Permission',
                ]);
      $delete_menu_permission = Permission::create( [
                    'name' => 'menu-delete',
                    'label' => 'Delete Menu Permission',
                ]);

      $super_admin_role->permissions()->attach($read_menu_permission);
      $super_admin_role->permissions()->attach($create_menu_permission);
      $super_admin_role->permissions()->attach($update_menu_permission);
      $super_admin_role->permissions()->attach($delete_menu_permission);

      $admin_role->permissions()->attach($read_menu_permission);

    }
}
