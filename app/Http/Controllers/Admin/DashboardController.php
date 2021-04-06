<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Zutaten;
use App\Models\Frontend\Speisekarte;

class DashboardController extends Controller
{

    public function index()
    {
        $speisekarte = Speisekarte::count();
        $kategorien = Category::count();
        $zutaten = Zutaten::count();
        return view('admin.dashboard', compact('kategorien', 'speisekarte', 'zutaten'));
    }
}