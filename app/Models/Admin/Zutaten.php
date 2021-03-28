<?php

namespace App\Models\Admin;

use App\Models\Frontend\Speisekarte;
use Illuminate\Database\Eloquent\Model;

class Zutaten extends Model
{
    public $table = 'zutatens';

    public function speisekarte()
    {
        return $this->belongsToMany(Speisekarte::class);
    }
}