<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{

    /**
     * @var Role
     */
    protected $roles;

    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->roles->get();
        return \View::make('admin.roles.index', [
            'roles'              =>  $roles,
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
        return \View::make('admin.roles.create', [
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
        $this->roles->create($request->only('name', 'label'));
        return \Redirect::route('admin.roles.index', [
         ])->withMessage(trans('acl::role.roles-controller-successfully_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
      $role = Role::with('permissions')->findOrFail($id);
      return \View::make('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = $this->roles->findOrFail($id);
        return \View::make('admin.roles.edit', [
            'role'              =>  $role,
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
        $this->roles->findOrFail($id)->update($request->only('name', 'label'));
        return \Redirect::route('admin.roles.index', [
         ])->withMessage(trans('acl::role.roles-controller-successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->roles->findOrFail($id)->delete();
        return \Redirect::route('admin.roles.index', [
         ])->withMessage(trans('acl::role.roles-controller-successfully_deleted'));
    }
}
