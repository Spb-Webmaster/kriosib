<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $table = 'pages';
    protected $fillable = [
        'title',
        'slug',
        'subtitle',

        'title_teaser',
        'img_teaser',
        'text_teaser',


        'img',
        'img_top',
        'text',
        'img_bottom',
        'text2',

        'faq_title',
        'faq',

        'published',
        'params',
        'module',

        'metatitle',
        'description',
        'keywords',
        'sorting'];


    protected $casts = [
        'params' => 'collection',
        'module' => 'collection',
    ];




    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        #  static::saving(function ($Moonshine) {   });


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
