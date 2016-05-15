<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role as Role;
use App\Permission as Permission;
use App\Menu as Menu;

class AdminController extends Controller
{

  /**
  * @var Role
  */

  public function __construct()
  {
    //$this->middleware(['auth', 'admin']);
  }

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  //\Illuminate\Routing\Router $router
  public function index()
  {
    return \View::make('acl::admin.dashboard', [
      'title'              => 'list',
    ]);
  }

  /**
  * Display given permissions to role.
  *
  * @return void
  */
  public function getUserRolePermissions()
  {
    $roles = Role::select('id', 'name', 'label')->get();
    $permissions = Permission::select('id', 'name', 'label')->get();
    return \View::make('admin.permissions.role-assign-permissions', [
      'roles'              =>  $roles,
      'permissions'        =>  $permissions,
      'title'              => 'assign',
    ]);
  }


  /**
  * Store given permissions to role.
  *
  * @param  \Illuminate\Http\Request  $request
  *
  * @return void
  */
  public function postUserRolePermissions(Request $request)
  {
    $this->validate($request, ['role' => 'required', 'permissions' => 'required']);
    $role = Role::with('permissions')->whereName($request->role)->first();
    $role->permissions()->detach();
    foreach ($request->permissions as $permission_name) {
      $permission = Permission::whereName($permission_name)->first();
      $role->assign($permission);
    }
    \Session::flash('flash_message', 'Permission granted!');
    return \Redirect::route('admin.assign-role-permissions',[
    ]);
  }

  /**
  * Display user profile.
  *
  * @return Response
  */
  public function profile()
  {
    return \View::make('admin.profiles.profile',[
      'user'                => \Auth::user(),
      'title'              => 'view',
    ]);
  }


}
