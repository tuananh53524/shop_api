<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\AliasLoader;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $serviceBindings = [
        \App\Services\BaseService::class => \App\Services\BaseServiceImpl::class,
        \App\Services\User\UserService::class => \App\Services\User\UserServiceImpl::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     * Register binding services
     *
     * @return void
     */
    protected function registerServices()
    {
        if (!empty($this->serviceBindings)) {
            foreach ($this->serviceBindings as $interface => $handler) {
                $this->app->bind($interface, $handler);
            }
        }
    }

    // protected function loadHelpers()
    // {
    //     require_once(__DIR__ . '/../Supports/Constants.php');
    // }

    // protected function loadFacades()
    // {
    //     $aliasLoader = AliasLoader::getInstance();
    //     $aliasLoader->alias('AppHelper', Helper::class);
    // }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        // $this->loadHelpers();
        // $this->loadFacades();
    }
}
