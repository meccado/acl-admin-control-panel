<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Meccado\AclAdminControlPanel\Http\Requests\ProfileImageFormRequest;
use Meccado\AclAdminControlPanel\Http\Requests\ProfileFormRequest;
use App\Http\Controllers\Controller;
use App\Profile as Profile;
use App\User as User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File as File;

class ProfileController extends Controller
{

  /**
  * @var Role
  */
  protected $profiles;

  public function __construct(Profile $profiles)
  {
    $this->profiles = $profiles;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $profiles = $this->profiles->get();
    return \View::make('acl::admin.profiles.index', compact('profiles'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function profileForm()
  {
    return \View::make('acl::admin.profiles.profile');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function profile(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id = null)
  {
    //$userId = $id != null ? $id : \Auth::user()->id;
    //$user = User::with('profile')->findOrFail($userId);
    return \View::make('acl::admin.profiles.profile');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    return \View::make('acl::admin.profiles.edit');
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(ProfileImageFormRequest $request, $id)
  {
    if($request->hasFile('avatar'))
    {
      $avatar = $request->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, 300)->save( public_path('/assets/images/avatars/' . $filename ) );
      $user = User::with('profile')->findOrFail($id);
      $profile = $user->profile;
      $profile->avatar = '/assets/images/avatars/' . $filename;
      $profile->bio = Input::get('bio');
      $profile->update();
    }
    return \View::make('acl::admin.profiles.profile');
  }

  public function updateProfile(ProfileFormRequest $request, $id)
  {
    $user = User::with('profile')->findOrFail($id);
    $user->profile->bio = Input::get('bio');
    $user->profile->experience = Input::get('experience');
    $user->profile->address = Input::get('address');
    $user->profile->city = Input::get('city');
    $user->profile->state = Input::get('state');
    $user->profile->zip = Input::get('zip');
    $user->profile->update();
    $user = User::with('profile')->findOrFail($id);
    return \View::make('acl::admin.profiles.profile');
  }


  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function updateImage(Request $request, $id)
  {
    if($request->hasFile('avatar'))
    {
      $avatar = $request->file('avatar');
      $filename = uniqid() . '.' . $avatar->getClientOriginalExtension();
      if (!File::exists(public_path('assets\images\avatars')))
      {
          File::makeDirectory(public_path('assets\images\avatars'), $mode = 0777, true, true);
      }
      \Image::make($avatar)->resize(320, 240)->save( public_path('assets\images\avatars\\' . $filename ) );
      $user = User::with('profile')->findOrFail($id);
      $user->profile->avatar = '/assets/images/avatars/' . $filename;
      $user->profile->file_name = $filename;
      $user->profile->update();
    }
    return \View::make('acl::admin.profiles.profile');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
