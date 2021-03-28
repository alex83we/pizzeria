<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Zutaten;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ZutatensController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Admin|Inhaber|create an ingredient');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zutaten = Zutaten::all();

        return view('admin.zutaten.index', compact('zutaten', $zutaten));
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
        $zutaten = new Zutaten();
        $zutaten->zutat = $request->zutat;
        $zutaten->aufpreis = $request->aufpreis;

        if ($zutaten->save()) {
            Toastr::success('Erfolgreich gespeichert!', 'ERFOLGREICH');
        } else {
            Toastr::error('Ein fehler ist aufgetreten!', 'FEHLER');
        }

        return response()->json($zutaten);
    }

    /**
     * Display the specified resource.
     *
     * @param Zutaten $zutaten
     * @return \Illuminate\Http\Response
     */
    public function show(Zutaten $zutaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Zutaten $zutaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Zutaten $zutaten)
    {
        return response()->json($zutaten);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Zutaten $zutaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zutaten $zutaten)
    {
        $zutaten = Zutaten::find($request->id);
        $zutaten->zutat = $request->zutat;
        $zutaten->aufpreis = $request->aufpreis;

        if ($zutaten->save()) {
            Toastr::success('Erfolgreich gespeichert!', 'ERFOLGREICH');
        } else {
            Toastr::error('Ein fehler ist aufgetreten!', 'FEHLER');
        }

        return response()->json($zutaten);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Zutaten $zutaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zutaten $zutaten)
    {
        //
    }
}