<?php

namespace Meccado\AclAdminControlPanel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router as Router;
use Symfony\Component\Finder\Finder;
use Illuminate\Filesystem\Filesystem;

class AclAdminControlPanelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //$this->loadAutoloader(base_path('packages'));
        // \App::register('Collective\Html\HtmlServiceProvider');
        // \App::register('Cviebrock\EloquentSluggable\SluggableServiceProvider');
        // $this->app->booting(function()
        // {
        //     $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        //     $loader->alias('HTML', 'Collective\Html\HtmlFacade');
        //     $loader->alias('Form', 'Collective\Html\FormFacade');
        //     $loader->alias('Sluggable', 'Cviebrock\EloquentSluggable\Facades\Sluggable');
        // });
        $router->middleware('roles', \App\Http\Middleware\HasRole::class);
        $router->middleware('admin', \App\Http\Middleware\AdminMiddleware::class);
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $configFiles = ['acl'];
        foreach ($configFiles as $config) {
            $this->mergeConfigFrom(__DIR__."/config/{$config}.php", 'acl');
        }

        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'acl');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'acl');

        //Publish middleware
        $this->publishes([
            __DIR__ . '/Middleware/' => app_path('Http/Middleware'),
        ]);

        //Publish providers
        $this->publishes([
            __DIR__ . '/Providers/' => app_path('Providers'),
        ]);

        //Publish views
        $this->publishes([
           // __DIR__.'/resources/views' => resource_path('views/vendor/user-auth'),
             __DIR__.'/resources/views' => resource_path('views'),
        ], 'views');

        //Publish translations
        $this->publishes([
            __DIR__.'/resources/lang/' => resource_path('lang/'),
           // __DIR__.'/resources/lang/pagination.php' => resource_path('lang/pagination.php'),
           // __DIR__.'/resources/lang/password.php' => resource_path('lang/password.php'),
           // __DIR__.'/resources/lang/validation.php' => resource_path('lang/validation.php'),
        ], 'translations');

        // Publish a config file
        $this->publishes([
            __DIR__.'/config/acl.php' => config_path('acl.php'),
        ], 'config');

        //Publish migrations
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
              __DIR__ . '/database/seeds' => database_path('seeds'),
        ], 'migrations');

        $this->publishes([
             __DIR__.'/assets/bower_components/AdminLTE/' => public_path('/assets/bower_components/AdminLTE/'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/Http/Controllers/Auth/'    => app_path('/Http/Controllers/Auth/'),
            __DIR__ . '/Http/Controllers/Admin/'    => app_path('/Http/Controllers/Admin/'),
        ], 'controllers');
        $this->publishes([
            __DIR__ . '/Models/Admin/' => app_path(),
        ], 'models');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind('acl', function($app){
            return new AclAdminControlPanel;
        });
    }


    /**
    * Require composer's autoload file the packages.
    *
    * @return void
    **/
    protected function loadAutoloader($path)
    {
        $finder = new Finder;
        $files = new Filesystem;

        $autoloads = $finder->in($path)->files()->name('autoload.php')->depth('<= 3')->followLinks();

        foreach ($autoloads as $file)
        {
            $files->requireOnce($file->getRealPath());
        }
    }
}
