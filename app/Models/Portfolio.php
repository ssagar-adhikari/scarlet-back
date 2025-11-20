<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Portfolio extends Model
{
        use HasFactory;
   protected $fillable = [
        'title', 'slug', 'description', 'build_size', 'land_size', 'budget', 'year'
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
