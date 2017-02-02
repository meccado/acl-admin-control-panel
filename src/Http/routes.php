<?php

// \DB::listen(function($sql) {
//     dd($sql);
// });

Route::group(['namespace' 	=> 'App\Http\Controllers',
							'middleware' 	=> ['web', 'throttle'],
 							], function(){
			$app = $this->app;
			$version = $app::VERSION;  
			if(strcmp(substr($version, 0, 3) , "5.2" ) === 0){
				Route::auth();	
			}else{
				Auth::routes();
			}

			//'prefix'=>'api/v1',
			Route::group(['prefix' =>  'admin',
										'before' => 'permission:user-manager',
										'roles' => ['super-admin', 'admin', 'user'],
	 							 		'middleware' 	=> ['auth', 'roles', 'admin'],
	 					 				], function(){

					// User Admin Routes...
					Route::resource('users',  'Admin\UserController');

					// User Role Admin Routes...
					Route::resource('roles',  'Admin\RoleController');
					// User Roles Permission Admin Routes...
					Route::resource('permissions',  'Admin\PermissionController');
					Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\\AdminController@index']);
					Route::get('assign-role-permissions', ['as' => 'admin.assign-role-permissions', 'uses' => 'Admin\\AdminController@getUserRolePermissions']);
					Route::post('assign-role-permissions', ['as' => 'admin.assign-role-permissions', 'uses' => 'Admin\\AdminController@postUserRolePermissions']);
					Route::get('profiles', ['as' => 'admin.profiles', 'uses' => 'Admin\\AdminController@profile']);

					Route::resource('menus',  'Admin\MenuController');

					//Route::resource('profiles', 'Admin\ProfileController', ['only' => ['index', 'edit', 'update']]);
			});

			Route::group(['prefix' =>  'admin',], function(){
					//Route::get('profile', ['as' => 'profile.show', 'uses' => 'Admin\ProfileController@showProfile']);
					Route::patch('profile/{profile}', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@updateProfile']);
					Route::get('profile/{profile?}', ['as' => 'profile.show', 'uses' => 'Admin\ProfileController@show']);
					Route::patch('profile/{profile}/upload', ['as' => 'profile.avatar', 'uses' => 'Admin\ProfileController@updateImage']);
				});
});

View::composer('acl::*', function ($view) {
	$menus = [];
	$menu_items = [];
	$user = [];
	if(Auth::check()){
		$menus = \App\Menu::whereHas('roles', function($q)
		{
				$roles = Auth::user()->roles->pluck('id');
		    $q->whereIn('id', $roles)
				->where('parent_id', 0);
		})->orderBy('sort_order', 'ASC')->distinct()->get();

		$menu_items = \App\Menu::whereHas('roles', function($q)
		{
				$roles = Auth::user()->roles->pluck('id');
		    $q->whereIn('id', $roles);
				//->where('parent_id', 0);
		})->orderBy('sort_order', 'ASC')->distinct()->paginate();
		//dd(count($menu_items));
		$userId = \Auth::user()->id;
		$user = \App\User::with('profile')->findOrFail($userId);
	}
	$view->with(compact('menus', 'menu_items', 'user'));
});
