<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    protected $casts = [
        'show_in_homepage' => 'boolean',
    ];
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'build_size',
        'land_size',
        'budget',
        'year',
        'status',
        'show_in_homepage'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($portfolio) {
            $portfolio->slug = Str::slug($portfolio->title);
        });
    }

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
