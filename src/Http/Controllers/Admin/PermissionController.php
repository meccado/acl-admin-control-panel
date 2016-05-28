<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Request\ProfileImageFormRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission as Permission;

class PermissionController extends Controller
{

  /**
  * @var Role
  */
  protected $permissions;

  public function __construct(Permission $permissions)
  {
    $this->permissions = $permissions;
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\View\View
  */
  public function index()
  {
    $permissions = $this->permissions->get();
    return \View::make('admin.permissions.index', [
      'permissions'        =>  $permissions,
      'title'              => 'list',
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\View\View
  */
  public function create()
  {
    return \View::make('admin.permissions.create', [
      'title'              => 'create',
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\RedirectResponse
  */
  public function store(Request $request)
  {
    Permission::create($request->all());
    \Session::flash('flash_message', 'Permission added!');
    return \Redirect::route('api.v1.permissions.index', [
      ])->withMessage(trans('acl::permission.permissions-controller-successfully_created'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\View\View
    */
    public function show($id)
    {
      $permission = Permission::findOrFail($id);
      return \View::make('admin.permissions.show', compact('permission'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\View\View
    */
    public function edit($id)
    {
      $permission = Permission::findOrFail($id);
      return \View::make('admin.permissions.edit', [
        'permission'        =>  $permission,
        'title'              => 'edit',
      ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\RedirectResponse
    */
    public function update(Request $request, $id)
    {
      $permission = Permission::findOrFail($id)->update($request->only('name', 'label'));
      \Session::flash('flash_message', 'Permission updated!');
      return \Redirect::route('admin.permissions.index', [
        ])->withMessage(trans('acl::permission.permissions-controller-successfully_updated'));
      }

      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\RedirectResponse
      */
      public function destroy($id)
      {
        Permission::destroy($id);
        \Session::flash('flash_message', 'Permission deleted!');
        return \Redirect::route('admin.permissions.index', [
          ])->withMessage(trans('acl::permission.permissions-controller-successfully_deleted'));
        }
      }
