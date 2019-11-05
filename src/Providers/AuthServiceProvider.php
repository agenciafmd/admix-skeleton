<?php

namespace :namespace_vendor\:namespace_skeleton_name\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        '\:namespace_vendor\:namespace_skeleton_name\:skeleton_name' => '\:namespace_vendor\:namespace_skeleton_name\Policies\:skeleton_namePolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
