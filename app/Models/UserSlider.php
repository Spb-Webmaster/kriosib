<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSlider extends Model
{
    protected $table = 'user_sliders';
    protected $fillable = ['slider'];
    protected $casts = [
        'slider' => 'collection',
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
