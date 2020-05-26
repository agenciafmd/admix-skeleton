<?php

namespace :namespace_vendor\:namespace_skeleton_name\Providers;

use :namespace_vendor\:namespace_skeleton_name\:skeleton_name;
use Illuminate\Support\ServiceProvider;

class :skeleton_nameServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->providers();

        $this->setMenu();

        $this->setSearch();

        $this->loadViews();

        $this->loadMigrations();

        $this->loadTranslations();

        $this->loadViewComposer();

        $this->publish();

        if ($this->app->environment('local') && $this->app->runningInConsole()) {
            $this->setLocalFactories();
        }
    }

    protected function providers()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);
    }

    protected function setMenu()
    {
        $this->app->make('admix-menu')
            ->push((object)[
                'view' => ':vendor/:skeleton_name_plural_lower::partials.menus.item',
                'ord' => config(':package_name.sort', 1),
            ]);
    }

    protected function setSearch()
    {
        $this->app->make('admix-search')
            ->registerModel(:skeleton_name::class, 'name');
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', ':vendor/:skeleton_name_plural_lower');
    }

    protected function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function loadTranslations()
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
    }

    protected function loadViewComposer()
    {
        //
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/:vendor/:skeleton_name_plural_lower'),
        ], 'views');
    }

    public function setLocalFactories()
    {
        $this->app->make('Illuminate\Database\Eloquent\Factory')
            ->load(__DIR__ . '/../database/factories');
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
}
