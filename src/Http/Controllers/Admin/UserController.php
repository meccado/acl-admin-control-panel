<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

  /**
  * @var Role
  */
  protected $users;

  public function __construct(User $users)
  {
    $this->users = $users;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\View\View
  */
  public function index()
  {
    $users = $this->users->with('roles')->get();
    return \View::make('admin.users.index', [
      'users'              =>  $users,
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
    $roles = Role::pluck('name', 'id');
    return \View::make('admin.users.create', [
      'roles'              =>  $roles,
      'title'              => 'create',
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\RedirectRespons
  */
  public function store(Request $request)
  {
    $input = $request->all();
    $input['password'] = Hash::make($input['password']);
    $user = $this->users->create($input);

    //create Blank profile
    $profile = Profile::create([
      'user_id' => $user->id,
      'bio'     => '',
    ]);
    $profile->save();

    return \Redirect::route('admin.users.index', [
      ])->withMessage(trans('acl::user.users-controller-successfully_created'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\View\View
    */
    public function show($id)
    {
      $user  = $this->users->findOrFail($id);
      return \View::make('admin.users.show', [
        'user'              =>  $user,
        'title'              => 'view',
      ]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\View\View
    */
    public function edit($id)
    {
      $user  = $this->users->findOrFail($id);
      $roles = Role::pluck('name', 'id');
      return \View::make('admin.users.edit', [
        'user'              =>  $user,
        'roles'              =>  $roles,
        'title'              => 'edit',
      ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\View\View
    */
    public function update(Request $request, $id)
    {
      $user = $this->users->findOrFail($id);
      $input = $request->all();
      $input['password'] = Hash::make($input['password']);
      $user->update($input);
      return \Redirect::route('admin.users.index', [
        ])->withMessage(trans('acl::user.users-controller-successfully_updated'));
      }

      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\RedirectRespons
      */
      public function destroy($id)
      {
        $user = $this->users->findOrFail($id);
        User::destroy($id);
        return \Redirect::route('admin.users.index', [
          ])->withMessage(trans('acl::user.users-controller-successfully_deleted'));
        }
      }
