<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'img',
        'price',
        'desc',
        'plan',
        'property',
        'desc2',
        'params',
        'published',
        'sorting',
    ];

    protected $casts = [
        'plan' => 'collection',
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
