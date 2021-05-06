<?php

namespace :namespace_vendor\:namespace_skeleton_name\Models;

use Database\Factories\:skeleton_nameFactory;
use Agenciafmd\Media\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class :skeleton_name extends Model implements AuditableContract, HasMedia, Searchable
{
    use SoftDeletes, HasFactory, Auditable, MediaTrait;

    protected $guarded = [
        'media',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'star' => 'boolean',
    ];

    public $searchableType;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->searchableType = config(':package_name.name');
    }

    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->name,
            route('admix.:skeleton_name_plural_lower.edit', $this->id)
        );
    }

    /*public function getUrlAttribute()
    {
        return route('frontend.:skeleton_name_lower.show', [
            $this->slug
        ]);
    }*/

    public function scopeIsActive($query)
    {
        $query->where('is_active', 1);
    }

    public function scopeSort($query)
    {
        $sorts = default_sort(config(':package_name.default_sort'));

        foreach ($sorts as $sort) {
            if ($sort['field'] === 'sort') {
                $query->orderByRaw('ISNULL(sort), sort ' . $sort['direction']);
            }
            else {
                $query->orderBy($sort['field'], $sort['direction']);
            }
        }
    }

    protected static function newFactory()
    {
        return :skeleton_nameFactory::new();
    }
}
