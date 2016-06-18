<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu as Menu;
use App\Role as Role;
use Illuminate\Support\Str;

class MenuController extends Controller
{


  /**
  * @var Role
  */
  protected $menus;

  public function __construct(Menu $menus)
  {
    $this->menus = $menus;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    if ( \Auth::user()->roles[0]->can('menu-read' ) ) {
      $items = $this->menus->with('roles')
      ->where('parent_id', '=', '0')
      ->orderBy('sort_order', 'ASC')->get();
      return \View::make('acl::admin.menus.index', [
        'items'   =>  $items,
        'title'   => 'list',
      ]);
    }
    return \Redirect::route('admin.menus.index')->withErrors(trans('acl::dashboard.unauthorized_access'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    if ( \Auth::user()->roles[0]->can('menu-create' ) ) {
      $items = $this->menus->lists('name', 'id')->toarray();
      $roles = Role::lists('name', 'id')->toarray();
      $selected = [];
      return \View::make('acl::admin.menus.create', [
        'items'    =>  $items,
        'roles'    =>  $roles,
        'selected' =>  $selected,
        'title'    => 'create',
      ]);
    }
    return \Redirect::route('admin.menus.index')->withErrors(trans('acl::dashboard.unauthorized_access'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    if ( \Auth::user()->roles[0]->can('menu-create' ) ) {
      $input = $request->all();
      $input['url'] = "admin/".str_plural(Str::lower($input['name'] != 'Dashboard' ? $string=str_replace(" ","_", $input['name']) : ''));
      $menu = $this->menus->create($input);
      foreach ($request->roles as $_id) {
        $role = Role::whereId($_id)->first();
        $menu->assign($role);
      }
      \Session::flash('flash_message', 'Menu added!');
      return \Redirect::route('admin.menus.index', [
        ])->withMessage(trans('acl::menu.menus-controller-successfully_created'));
      }
      return \Redirect::route('admin.menus.index')->withErrors(trans('acl::dashboard.unauthorized_access'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      if ( \Auth::user()->roles[0]->can('menu-read' ) ) {
        $menu = $this->menus->findOrFail($id);
        return view('admin.menus.show', compact('menu'));
      }
      return \Redirect::route('admin.menus.index')->withErrors(trans('acl::dashboard.unauthorized_access'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      if ( \Auth::user()->roles[0]->can('menu-update' ) ) {
        $menu = $this->menus->findOrFail($id);
        $items = $this->menus->lists('name', 'id')->toarray();
        $roles = Role::lists('name', 'id')->toarray();
        $selected = $menu->roles->lists('id')->toarray();
        return view('admin.menus.edit', compact('menu', 'selected', 'roles', 'items'));
      }
      return \Redirect::route('admin.menus.index')->withErrors(trans('acl::dashboard.unauthorized_access'));

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      if ( \Auth::user()->roles[0]->can('menu-update' ) ) {
        $input = $request->all();
        $input['url'] = "admin/".str_plural(Str::lower($input['name'] != 'Dashboard' ? $string=str_replace(" ","_", $input['name']) : ''));
        $menu = $this->menus->findOrFail($id);
        $menu->update($input);
        $menu->roles()->detach();
        foreach ($request->roles as $_id) {
          $role = Role::whereId($_id)->first();
          $menu->assign($role);
        }
        \Session::flash('flash_message', 'Menu updated!');
        return \Redirect::route('admin.menus.index', [
          ])->withMessage(trans('acl::menu.menus-controller-successfully_updated'));
        }
        return \Redirect::route('admin.menus.index')->withErrors(trans('acl::dashboard.unauthorized_access'));
      }

      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function destroy($id)
      {
        if ( \Auth::user()->roles[0]->can('menu-delete' ) ) {
          $this->menus->findOrFail($id)->delete();
          return \Redirect::route('admin.menus.index', [
            ])->withMessage(trans('acl::menu.menus-controller-successfully_deleted'));
          }
          return \Redirect::route('admin.menus.index')->withErrors(trans('acl::dashboard.unauthorized_access'));
        }
      }
