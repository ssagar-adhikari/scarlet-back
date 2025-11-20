<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'pinterest',
        'map',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}
