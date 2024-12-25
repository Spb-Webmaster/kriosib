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
}
