<?php

namespace :namespace_vendor\:namespace_skeleton_name\Providers;

use :namespace_vendor\:namespace_skeleton_name\Policies\:skeleton_namePolicy;
use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        :skeleton_name::class => :skeleton_namePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
