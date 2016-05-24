<?php

// \DB::listen(function($sql) {
//     dd($sql);
// });

Route::group(['namespace' 	=> 'App\Http\Controllers',
							'middleware' 	=> ['web', 'throttle'],
 							], function(){
			Route::auth();

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

					Route::get('/profiles/{username}', 'ProfileController@show');
			});
});

View::composer('acl::*', function ($view) {
	$menus = [];
	$menu_items = [];
	if(Auth::check()){
		$menus = \App\Menu::whereHas('roles', function($q)
		{
				$roles = Auth::user()->roles->lists('id');
		    $q->whereIn('id', $roles)
				->where('parent_id', 0);
		})->orderBy('sort_order', 'ASC')->distinct()->get();

		$menu_items = \App\Menu::whereHas('roles', function($q)
		{
				$roles = Auth::user()->roles->lists('id');
		    $q->whereIn('id', $roles);
				//->where('parent_id', 0);
		})->orderBy('sort_order', 'ASC')->distinct()->paginate();
		//dd(count($menu_items));
	}
	$view->with(compact('menus', 'menu_items'));
});
