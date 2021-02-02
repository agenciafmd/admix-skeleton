<?php

namespace :namespace_vendor\:namespace_skeleton_name\Observers;

use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;
use Illuminate\Support\Str;

class :skeleton_nameObserver
{
    public function saving(:skeleton_name $model)
    {
        $model->slug = Str::slug($model->name);
    }

    public function saved(:skeleton_name $model)
    {
        //
    }
}