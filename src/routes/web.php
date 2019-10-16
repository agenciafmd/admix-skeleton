<?php

/*
|--------------------------------------------------------------------------
| ADMIX Routes
|--------------------------------------------------------------------------
*/

Route::prefix(config('admix.url') . '/:skeleton_name_plural_lower')
    ->name('admix.:skeleton_name_plural_lower.')
    ->middleware(['auth:admix-web'])
    ->group(function () {
        Route::get('', ':skeleton_nameController@index')
            ->name('index')
            ->middleware('can:view,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::get('trash', ':skeleton_nameController@index')
            ->name('trash')
            ->middleware('can:restore,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::get('create', ':skeleton_nameController@create')
            ->name('create')
            ->middleware('can:create,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::post('', ':skeleton_nameController@store')
            ->name('store')
            ->middleware('can:create,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::get('{:skeleton_name_lower}', ':skeleton_nameController@show')
            ->name('show')
            ->middleware('can:view,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::get('{:skeleton_name_lower}/edit', ':skeleton_nameController@edit')
            ->name('edit')
            ->middleware('can:update,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::put('{:skeleton_name_lower}', ':skeleton_nameController@update')
            ->name('update')
            ->middleware('can:update,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::delete('destroy/{:skeleton_name_lower}', ':skeleton_nameController@destroy')
            ->name('destroy')
            ->middleware('can:delete,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::post('{id}/restore', ':skeleton_nameController@restore')
            ->name('restore')
            ->middleware('can:restore,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::post('batchDestroy', ':skeleton_nameController@batchDestroy')
            ->name('batchDestroy')
            ->middleware('can:delete,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
        Route::post('batchRestore', ':skeleton_nameController@batchRestore')
            ->name('batchRestore')
            ->middleware('can:restore,\:namespace_vendor\:namespace_skeleton_name\:skeleton_name');
    });
