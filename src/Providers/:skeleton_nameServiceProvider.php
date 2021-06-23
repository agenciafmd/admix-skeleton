<?php

namespace :namespace_vendor\:namespace_skeleton_name\Providers;

use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;
use :namespace_vendor\:namespace_skeleton_name\Observers\:skeleton_nameObserver;
use Illuminate\Support\ServiceProvider;

class :skeleton_nameServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->providers();

        $this->setObservers();

        $this->setSearch();

        $this->loadMigrations();

        $this->publish();
    }

    protected function providers()
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(BladeServiceProvider::class);
        $this->app->register(LivewireServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    protected function setObservers()
    {
        :skeleton_name::observe(:skeleton_nameObserver::class);
    }

    protected function setSearch()
    {
        $this->app->make('admix-search')
            ->registerModel(:skeleton_name::class, 'name');
    }

    protected function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        $this->loadConfigs();
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/:package_name.php', ':package_name');
        $this->mergeConfigFrom(__DIR__ . '/../config/gate.php', 'gate');
        $this->mergeConfigFrom(__DIR__ . '/../config/audit-alias.php', 'audit-alias');
        $this->mergeConfigFrom(__DIR__ . '/../config/upload-configs.php', 'upload-configs');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../Database/Faker' => base_path('database/faker'),
            __DIR__ . '/../config/upload-configs.php' => base_path('config/upload-configs.php'),
        ], ':package_name:minimal');

        $this->publishes([
            __DIR__ . '/../Database/Factories/:skeleton_nameFactory.php' => base_path('database/factories/:skeleton_nameFactory.php'),
            __DIR__ . '/../Database/Faker' => base_path('database/faker'),
            __DIR__ . '/../Database/Seeders/:skeleton_name_pluralTableSeeder.php' => base_path('database/seeders/:skeleton_name_pluralTableSeeder.php'),
        ], ':package_name:seeders');
    }
}
