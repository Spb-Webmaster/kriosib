<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

    protected $fillable = [
        'title',
        'subtitle',
        'desc',
        'desc2',
        'sku',
        'price',
        'property',
        'params',
        'published',
        'sorting',
    ];
    protected $casts = [
        'property' => 'collection',
        'params' => 'collection',
    ];
    protected static function boot()
    {
        parent::boot();


        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });

    }
}
