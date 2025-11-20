<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'sequence',
        'image',
        'youtube_id',
        'title',
    ];
}

