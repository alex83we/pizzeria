<?php

namespace App\Models\Frontend;

use App\Models\Admin\Category;
use App\Models\Admin\Zutaten;
use Illuminate\Database\Eloquent\Model;

class Speisekarte extends Model
{
    public $table = 'speisekartes';

    protected $fillable = [
        'speisekarte_name',
        'speisekarte_basispreis',
        'speisekarte_basispreisabholung',
        'speisekarte_basispreislieferung',
        'speisekarte_allergene',
        'speisekarte_zusatzstoffe',
    ];

    public function zutatens()
    {
        return $this->belongsToMany(Zutaten::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}