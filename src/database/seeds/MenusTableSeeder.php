<?php

use Illuminate\Database\Seeder;

use App\Menu as Menu;
use App\User as User;

class MenusTableSeeder extends Seeder
{
    public function run()
    {

      $super_admin_user = User::where('email','=','super@domain.com')->first();
      $admin_user = User::where('email','=','admin@domain.com')->first();

      $menu_dashboard = Menu::create( [
          'name'               => 'Dashboard',
          'title'              => 'Dashboard',
          'parent_id'          => '0',
          'icon'               => 'fa fa-dashboard fa-fw',
          'sort_order'         => '0',
          'url'                => 'admin/',
      ] );
      $menu_dashboard->assign($super_admin_user);
      $menu_dashboard->assign($admin_user);

      $menu_menu = Menu::create( [
          'name'               => 'Menu',
          'title'              => 'Menu',
          'parent_id'          => '0',
          'icon'               => 'fa fa-navicon fa-fw',
          'sort_order'         => '1',
          'url'                => 'admin/menus',
      ] );
      $menu_menu->assign($super_admin_user);

      $menu_account = Menu::create( [
          'name'               => 'Account',
          'title'              => 'Account',
          'parent_id'          => '0',
          'icon'               => 'fa fa-cog fa-fw',
          'sort_order'         => '3',
          'url'                => 'admin/accounts',
      ] );
      $menu_account->assign($super_admin_user);
      $menu_account->assign($admin_user);

      $menu_user = Menu::create( [
          'name'               => 'User',
          'title'              => 'User',
          'parent_id'          => $menu_account->id,
          'icon'               => 'fa fa-user fa-fw',
          'sort_order'         => '0',
          'url'                => 'admin/users',
      ] );
      $menu_user->assign($super_admin_user);
      $menu_user->assign($admin_user);

      $menu_role = Menu::create( [
          'name'               => 'Role',
          'title'              => 'Role',
          'parent_id'          => $menu_account->id,
          'icon'               => 'fa fa-users fa-fw',
          'sort_order'         => '1',
          'url'                => 'admin/roles',
      ] );
      $menu_role->assign($super_admin_user);
      $menu_role->assign($admin_user);

      $menu_permission = Menu::create( [
          'name'               => 'Permission',
          'title'              => 'Permission',
          'parent_id'          => $menu_account->id,
          'icon'               => 'fa fa-key fa-fw',
          'sort_order'         => '2',
          'url'                => 'admin/permissions',
      ] );
      $menu_permission->assign($super_admin_user);
      $menu_permission->assign($admin_user);
    }
}
