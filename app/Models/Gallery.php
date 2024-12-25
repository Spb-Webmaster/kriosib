<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   protected $table = 'galleries';

   protected $fillable = [
       'title',
       'img',
       'published',
       'sorting',
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
