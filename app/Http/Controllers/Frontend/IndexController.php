<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Zutaten;
use App\Models\Frontend\Speisekarte;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function speisekarteIndex()
    {
        $category = DB::table('categories')
            ->join('speisekartes', 'speisekartes.categories_id', '=', 'categories.id')
            ->select('categories.title', 'categories.slug', 'categories.id', 'categories.slug', 'categories.kategorie', 'categories.description', 'categories.images')
            ->orderBy('categories.id', 'ASC')
            ->groupBy('categories.title', 'categories.slug', 'categories.id', 'categories.slug', 'categories.kategorie', 'categories.description', 'categories.images')
            ->get();
        $speisekarten = Speisekarte::with('categories')->with('zutatens')->get();

        return view('frontend.speisekarte', compact('speisekarten', 'category'));
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