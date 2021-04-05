<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\KontaktMail;
use App\Models\Admin\Category;
use App\Models\Admin\Firma;
use App\Models\Admin\Lieferzeiten;
use App\Models\Admin\Oeffnungszeiten;
use App\Models\Frontend\Speisekarte;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        $firma = Firma::first();
        $oeffnungszeiten = Oeffnungszeiten::all();
        $lieferzeiten = Lieferzeiten::all();

        return view('frontend.index', compact('firma', 'lieferzeiten'));
    }

    public function speisekarteIndex()
    {

        $firma = Firma::first();
        $oeffnungszeiten = Oeffnungszeiten::all();
        $category = DB::table('categories')
            ->join('speisekartes', 'speisekartes.categories_id', '=', 'categories.id')
            ->select('categories.title', 'categories.slug', 'categories.id', 'categories.slug', 'categories.kategorie', 'categories.description', 'categories.images')
            ->orderBy('categories.id', 'ASC')
            ->groupBy('categories.title', 'categories.slug', 'categories.id', 'categories.slug', 'categories.kategorie', 'categories.description', 'categories.images')
            ->get();
        $speisekarten = Speisekarte::with('categories')->with('zutatens')->get();

        return view('frontend.speisekarte', compact('speisekarten', 'category'));
    }

    public function speisekartePDFIndex()
    {
        $counter = Category::count();
        $category = DB::table('categories')
            ->join('speisekartes', 'speisekartes.categories_id', '=', 'categories.id')
            ->select('categories.title', 'categories.slug', 'categories.id', 'categories.slug', 'categories.kategorie', 'categories.description', 'categories.images')
            ->orderBy('categories.id', 'ASC')
            ->groupBy('categories.title', 'categories.slug', 'categories.id', 'categories.slug', 'categories.kategorie', 'categories.description', 'categories.images')
            ->get();
        $speisekarten = Speisekarte::with('categories')->with('zutatens')->get();
        $firmas = Firma::firstOrNew();
        $oeffnungszeitens = Oeffnungszeiten::all();
        $lieferzeitens = Lieferzeiten::all();

        $data = [
            'category' => $category,
            'speisekarten' => $speisekarten,
            'firmas' => $firmas,
            'oeffnungszeitens' => $oeffnungszeitens,
            'lieferzeitens' => $lieferzeitens,
            'counter' => $counter,
        ];

        $customPaper = array('0','0','559.37','793.7');
        $pdf = PDF::loadView('frontend.speisekartePDF', $data);
        $pdf->setPaper($customPaper);

        return $pdf->download('buttstaeder-bistro_Speisekarte.pdf');
        return view('frontend.speisekartePDF', compact('category', 'speisekarten', 'firmas', 'oeffnungszeitens', 'lieferzeitens', 'counter'));
    }

    public function lieferserviceIndex()
    {
        return view('frontend.lieferservice');
    }

    public function kontaktIndex()
    {
        $firma = Firma::firstOrNew();
        $oeffnungszeitens = Oeffnungszeiten::all();
        $lieferzeitens = Lieferzeiten::all();
        return view('frontend.kontakt', compact('firma', 'oeffnungszeitens', 'lieferzeitens'));
    }

    public function kontaktStore(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|max:255',
           'email' => 'required|email|max:255',
           'telefon' => 'required|max:255',
           'message' => 'required',
           'datenschutz' => 'required|in:1',
        ]);

        $kontakt = array(
            'name' => $request->name,
            'email' => $request->email,
            'telefon' => $request->telefon,
            'message' => nl2br($request->message),
            'datenschutz' => $request->datenschutz,
        );

        Mail::to('info@buttstaedter-bistro.de')->send(new KontaktMail($kontakt));
        return redirect()->route('frontend.index');
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