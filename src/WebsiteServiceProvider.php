<?php

namespace doctype_admin\Website;

use doctype_admin\Website\Contracts\ImageDataRepositoryInterface;
use doctype_admin\Website\Contracts\WebsiteDataRepositoryInterface;
use doctype_admin\Website\Repositories\ImageDataRepository;
use doctype_admin\Website\Repositories\WebsiteDataRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     *
     *Bootstrap Doctype Admin Website Services
     *
     *@return void
     *
     */

    public function boot()
    {
        $this->app->runningInConsole() ? $this->registerPublishing() : '';
        $this->registerResources();
    }

    /**
     *
     *Register Doctype Admin Wensite Services
     *
     *@return void
     *
     */

    public function register()
    {
        $this->commands([
            Console\DoctypeAdminWebsiteInstallerCommand::class
        ]);
        $this->repositoryInterfaceBinding();
        $this->facades();
    }

    /**
     *
     *Register Resources
     *
     *@return void
     *
     */

    public function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'website');
        $this->registerRoutes();
    }

    /**
     *
     *Publishing Resources
     *
     *@return void
     *
     */

    public function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../config/website.php' => config_path('website.php')
        ], 'website-config');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/wesbite')
        ], 'website-views');
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'website-migartions');
        $this->publishes([
            __DIR__ . '/../database/seeds' => database_path('seeds')
        ], 'website-seeds');
    }

    /**
     *
     *Register Routes
     *
     *@return void
     *
     */

    public function registerRoutes()
    {
        /* Web Routes */
        Route::group($this->routeWebConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
        /* API Routes */
        if (config('website.api_routes', false)) {
            Route::group($this->routeApiConfiguration(), function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
            });
        }
    }

    /**
     *
     *Route Web Configuration
     *
     *@return array
     *
     */

    public function routeWebConfiguration()
    {
        return [
            'prefix' => config('website.prefix', 'admin/website'),
            'namespace' => 'doctype_admin\Website\Http\Controllers',
            'middleware' => config('website.middleware', ['web', 'auth', 'activity', 'role:admin']),
        ];
    }

    /**
     *
     *Route Api Configuration
     *
     *@return array
     *
     */

    public function routeApiConfiguration()
    {
        return [
            'prefix' => config('website.api_prefix', 'api/website'),
            'namespace' => 'doctype_admin\Website\Http\APIControllers',
            'middleware' => config('website.api_middleware', ['web']),
        ];
    }

    /**
     *
     *Repository Interface Binding
     *
     *@return void
     *
     */
    private function repositoryInterfaceBinding()
    {
        $this->app->bind(ImageDataRepositoryInterface::class, ImageDataRepository::class);
        $this->app->bind(WebsiteDataRepositoryInterface::class, WebsiteDataRepository::class);
    }

    /**
     *
     *Facades Binding
     *
     *@return void
     *
     */
    private function facades(): void
    {
        app()->bind('website_image', function () {
            return new ImageDataRepository;
        });

        app()->bind('website', function () {
            return new WebsiteDataRepository;
        });
    }
}
