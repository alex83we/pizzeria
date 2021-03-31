<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Zutaten;
use App\Models\Frontend\Speisekarte;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SpeisekarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zutaten = Zutaten::orderBy('zutat', 'ASC')->get();
        $categorie = Category::all();

        return view('admin.speisekarte.speisekarte', compact('zutaten', 'categorie'));
    }

    public function speisekarteData()
    {
        $speisekarte = Speisekarte::all();
        return datatables()->of($speisekarte)
            ->addColumn('action', function ($row) {
                $token = csrf_token();
                $method = method_field('DELETE');
                $html = '<a href="./speisekarte/'.$row->id.'/edit" class="btn btn-sm btn-secondary" title="Bearbeiten"><i class="fas fa-eye"></i></a> ';
                $html .= '<form action="speisekarte/'. $row->id .'" method="POST" style="display: inline;"><input type="hidden" name="_token" value="'.$token.'">'.$method.'<button type="submit" data-rowid="'.$row->id.'" class="btn btn-sm btn-danger" title="Löschen"><i class="fas fa-trash"></i></button></form>';
                return $html;
            })->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'speisekarte_name' => 'required',
            'speisekarte_basispreis' => 'required',
            'speisekarte_kategorie' => 'required'
        ]);

        if ($request->speisekarte_basispreisabholung == true) { $abholung = $request->speisekarte_basispreisabholung; } else { $abholung = $request->speisekarte_basispreis; }
        if ($request->speisekarte_basispreislieferung == true) { $lieferung = $request->speisekarte_basispreislieferung; } else { $lieferung = $request->speisekarte_basispreis; }

        $speisekarte = new Speisekarte();
        $speisekarte->categories_id = $request->speisekarte_kategorie;
        $speisekarte->speisekarte_name = $request->speisekarte_name;
        $speisekarte->speisekarte_basispreis = $request->speisekarte_basispreis;
        $speisekarte->speisekarte_basispreisabholung = $abholung;
        $speisekarte->speisekarte_basispreislieferung = $lieferung;
        $speisekarte->speisekarte_allergene = $request->speisekarte_allergene;
        $speisekarte->speisekarte_allergene = $request->speisekarte_allergene;
        $speisekarte->speisekarte_zusatzstoffe = $request->speisekarte_zusatzstoffe;
        $speisekarte->save();

        $zutatenIds = $request->speisekarte_zutaten;
        $speisekarte->zutatens()->attach($zutatenIds);

        Toastr::success('Gericht erfolgreich angelegt!', 'ERFOLGREICH');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speisekarte = Speisekarte::with('zutatens')->with('categories')->findOrFail($id);
        $speisekarte->categories()->delete();
        $speisekarte->zutatens()->delete();
        $speisekarte->delete();
        dd($speisekarte);
    }
}