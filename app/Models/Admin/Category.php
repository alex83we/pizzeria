<?php

namespace App\Models\Admin;

use App\Models\Frontend\Speisekarte;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;

    public $table = 'categories';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function speisekarte()
    {
        return $this->belongsToMany(Speisekarte::class);
    }
}