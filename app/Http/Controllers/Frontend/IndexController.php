<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Category;
use App\Models\Frontend\Zutaten;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function speisekarteIndex()
    {
        $category = Category::all();
        $zutaten = Zutaten::all();

        return view('frontend.speisekarte', compact('category', $category, 'zutaten', $zutaten));
    }

    public function lieferserviceIndex()
    {
        return view('frontend.lieferservice');
    }

    public function kontaktIndex()
    {
        return view('frontend.kontakt');
    }

    public function impressumIndex()
    {
        return view('frontend.impressum');
    }

    public function datenschutzIndex()
    {
        return view('frontend.datenschutz');
    }
}