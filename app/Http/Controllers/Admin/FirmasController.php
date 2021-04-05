<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Firma;
use App\Models\Admin\Lieferzeiten;
use App\Models\Admin\Oeffnungszeiten;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirmasController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Admin|Inhaber|edit company data');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Firma::firstOrNew();
        $liefer = Lieferzeiten::all();
        $oeffnung = Oeffnungszeiten::all();

        return view('admin.firma.index', compact('data', 'liefer', 'oeffnung'));
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
            'firmenname' => 'required',
            'inhaber' => 'required',
            'straße' => 'required',
            'plz' => 'required|max:5',
            'ort' => 'required',
            'telefon' => 'required|max:25',
            'mobil' => 'required|max:25',
        ]);

        if ($request->id == 1) {
            DB::table('firmendaten')->where('id', '=', '1')->update([
                'firmenname' => $request->firmenname,
                'inhaber' => $request->inhaber,
                'straße' => $request->straße,
                'plz' => $request->plz,
                'ort' => $request->ort,
                'telefon' => $request->telefon,
                'mobil' => $request->mobil,
                'email' => $request->email,
                'updated_at' => now(),
            ]);
            Toastr::success('Die Firmendaten wurden erfolgreich geändert!', 'ÄNDERUNG ERFOLGREICH');
        } else {
            $firma = new Firma();
            $firma->firmenname = $request->firmenname;
            $firma->inhaber = $request->inhaber;
            $firma->straße = $request->straße;
            $firma->plz = $request->plz;
            $firma->ort = $request->ort;
            $firma->telefon = $request->telefon;
            $firma->mobil = $request->mobil;
            $firma->email = $request->email;
            $firma->updated_at = now();

            if ($firma->save()) {
                Toastr::success('Die Firmendaten wurden erfolgreich gespeichert!', 'SPEICHERUNG ERFOLGREICH');
            } else {
                Toastr::error('Es ist ein Fehler aufgetreten!', 'FEHLER');
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Firma $firma
     * @return \Illuminate\Http\Response
     */
    public function show(Firma $firma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Firma $firma
     * @return \Illuminate\Http\Response
     */
    public function edit(Firma $firma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Firma $firma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firma $firma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Firma $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firma $firma)
    {
        //
    }

    public function oeffnungszeitenStore(Request $request)
    {
        /*$this->validate($request, [
                    'wochentag' => 'required',
                    'von' => 'required',
                    'bis' => 'required',
                ]);*/

        $oeffnung = new Oeffnungszeiten();
        $oeffnung->wochentag = $request->wochentag;
        $oeffnung->von = $request->von;
        $oeffnung->bis = $request->bis;

        if ($oeffnung->save()) {
            Toastr::success('Erfolgreich gespeichert!', 'ERFOLGREICH');
        } else {
            Toastr::error('Ein fehler ist aufgetreten!', 'FEHLER');
        }

        return response()->json($oeffnung);
    }

    public function oeffnungszeitenEdit($id)
    {
        $oeffnung = Oeffnungszeiten::find($id);
        return response()->json($oeffnung);
    }

    public function oeffnungszeitenUpdate(Request $request)
    {
        $oeffnung = Oeffnungszeiten::find($request->id);
        $oeffnung->wochentag = $request->wochentag;
        $oeffnung->von = $request->von;
        $oeffnung->bis = $request->bis;

        if ($oeffnung->save()) {
            Toastr::success('Öffnungszeiten wurden geändert!', 'GEÄNDERT');
        } else {
            Toastr::error('Es ist ein Fehler aufgetreten!', 'FEHLER');
        }

        return response()->json($oeffnung);
    }

    public function lieferzeitenStore(Request $request)
    {
        $liefer = new Lieferzeiten();
        $liefer->wochentag = $request->wochentag;
        $liefer->von = $request->von;
        $liefer->bis = $request->bis;

        if ($liefer->save()) {
            Toastr::success('Erfolgreich gespeichert!', 'ERFOLGREICH');
        } else {
            Toastr::error('Ein fehler ist aufgetreten!', 'FEHLER');
        }

        return response()->json($liefer);
    }

    public function lieferzeitenEdit($id)
    {
        $liefer = Lieferzeiten::find($id);
        return response()->json($liefer);
    }

    public function lieferzeitenUpdate(Request $request)
    {
        $liefer = Lieferzeiten::find($request->id);
        $liefer->wochentag = $request->wochentag;
        $liefer->von = $request->von;
        $liefer->bis = $request->bis;

        if ($liefer->save()) {
            Toastr::success('Lieferzeiten wurden geändert!', 'GEÄNDERT');
        } else {
            Toastr::error('Es ist ein Fehler aufgetreten!', 'FEHLER');
        }

        return response()->json($liefer);
    }

}