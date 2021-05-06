<?php

namespace :namespace_vendor\:namespace_skeleton_name\Observers;

use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class :skeleton_nameObserver
{
    public function saving(:skeleton_name $model)
    {
        $model->slug = Str::slug($model->name);
    }

    public function saved(:skeleton_name $model)
    {
        if (!app()->runningInConsole()) {

            /* descomente caso for utilizar, não faça cache da listagem (ex. frontend.article.index)
            try {
                dispatch(function () use ($model) {
                    Artisan::call('page-cache:clear', [
                        'slug' => 'pc__index__pc',
                    ]);

                    Http::get(url('/'));
                })
                    ->delay(now()->addSeconds(5))
                    ->onQueue('low');
            } catch (\Exception $exception) {
                // não tem problema
            }

            try {
                dispatch(function () use ($model) {
                    $url = str_replace(config('app.url') . '/', '', $model->url);
                    Artisan::call('page-cache:clear', [
                        'slug' => $url,
                    ]);

                    Http::get($model->url);
                })
                    ->delay(now()->addSeconds(5))
                    ->onQueue('low');
            } catch (\Exception $exception) {
                // não tem problema
            }
            */
        }
    }
}