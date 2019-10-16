<?php

namespace :
namespace_vendor\:namespace_skeleton_name;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\SoftDeletes;use Illuminate\Support\Str;use OwenIt\Auditing\Auditable;use Spatie\MediaLibrary\HasMedia\HasMedia;use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class :skeleton_name extends Model implements AuditableContract, HasMedia
{
    use SoftDeletes, Auditable, HasMediaTrait, MediaTrait {
    MediaTrait::registerMediaConversions insteadof HasMediaTrait;
    }

    protected $guarded = [
    'media',
];

    protected static function boot()
{
    parent::boot();

    static::saving(function ($model) {
        $model->slug = Str::slug($model->name);
    });
}

    public function scopeIsActive($query)
{
    $query->where('is_active', 1);
}

    public function scopeSort($query)
{
    $sorts = default_sort(config(':package_name.default_sort'));

    foreach ($sorts as $sort) {
        $query->orderBy($sort['field'], $sort['direction']);
    }
}
}
