<?php

use :namespace_vendor\:namespace_skeleton_name\Http\Controllers\:skeleton_nameController;
use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;

Route::get(':skeleton_name_plural_lower/', [:skeleton_nameController::class, 'index'])
    ->name('admix.:skeleton_name_plural_lower.index')
    ->middleware('can:view,' . :skeleton_name::class);
Route::get(':skeleton_name_plural_lower/trash', [:skeleton_nameController::class, 'index'])
    ->name('admix.:skeleton_name_plural_lower.trash')
    ->middleware('can:restore,' . :skeleton_name::class);
Route::get(':skeleton_name_plural_lower/create', [:skeleton_nameController::class, 'create'])
    ->name('admix.:skeleton_name_plural_lower.create')
    ->middleware('can:create,' . :skeleton_name::class);
Route::post(':skeleton_name_plural_lower/', [:skeleton_nameController::class, 'store'])
    ->name('admix.:skeleton_name_plural_lower.store')
    ->middleware('can:create,' . :skeleton_name::class);
Route::get(':skeleton_name_plural_lower/{:skeleton_name_lower}', [:skeleton_nameController::class, 'show'])
    ->name('admix.:skeleton_name_plural_lower.show')
    ->middleware('can:view,' . :skeleton_name::class);
Route::get(':skeleton_name_plural_lower/{:skeleton_name_lower}/edit', [:skeleton_nameController::class, 'edit'])
    ->name('admix.:skeleton_name_plural_lower.edit')
    ->middleware('can:update,' . :skeleton_name::class);
Route::put(':skeleton_name_plural_lower/{:skeleton_name_lower}', [:skeleton_nameController::class, 'update'])
    ->name('admix.:skeleton_name_plural_lower.update')
    ->middleware('can:update,' . :skeleton_name::class);
Route::delete(':skeleton_name_plural_lower/destroy/{:skeleton_name_lower}', [:skeleton_nameController::class, 'destroy'])
    ->name('admix.:skeleton_name_plural_lower.destroy')
    ->middleware('can:delete,' . :skeleton_name::class);
Route::post(':skeleton_name_plural_lower/{id}/restore', [:skeleton_nameController::class, 'restore'])
    ->name('admix.:skeleton_name_plural_lower.restore')
    ->middleware('can:restore,' . :skeleton_name::class);
Route::post(':skeleton_name_plural_lower/batchDestroy', [:skeleton_nameController::class, 'batchDestroy'])
    ->name('admix.:skeleton_name_plural_lower.batchDestroy')
    ->middleware('can:delete,' . :skeleton_name::class);
Route::post(':skeleton_name_plural_lower/batchRestore', [:skeleton_nameController::class, 'batchRestore'])
    ->name('admix.:skeleton_name_plural_lower.batchRestore')
    ->middleware('can:restore,' . :skeleton_name::class);
