<?php

namespace App\Models\Admin;

use App\Models\Frontend\Speisekarte;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $table = 'categories';

    protected $fillable = [
        'title',
        'name',
        'slug',
        'images',
        'description',
        'kategorie',
    ];

    public function speisekarte()
    {
        return $this->belongsToMany(Speisekarte::class);
    }
}