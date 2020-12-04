<?php

namespace :namespace_vendor\:namespace_skeleton_name\Providers;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadBladeComponents();

        $this->setMenu();

        $this->loadViews();

        $this->loadTranslations();

        $this->publish();
    }

    public function register()
    {
        //
    }

    protected function loadBladeComponents()
    {
        //
    }

    protected function setMenu()
    {
        $this->app->make('admix-menu')
            ->push((object)[
                'view' => ':vendor/:skeleton_name_plural_lower::partials.menus.item',
                'ord' => config(':package_name.sort', 1),
            ]);
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', ':vendor/:skeleton_name_plural_lower');
    }

    protected function loadTranslations()
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/:vendor/:skeleton_name_plural_lower'),
        ], ':package_name:views');
    }
}
