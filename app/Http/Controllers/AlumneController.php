<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;
use App\Models\Centre;
use App\Models\Ensenyament;

class AlumneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnes = Alumne::with("ensenyament", "centre")->paginate(10);
        return view("alumne", compact("alumnes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumne = new Alumne;
        $title = __("Afegir alumne");
        $textButton = __("Afegir");
        $route = route("alumne.store");
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        return view("alumne.create", compact("alumne", "title", "textButton", "route", "centres", "ensenyaments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "cognoms" => "required",
            "data_naixement" => "required|date",
            "centre_id" => "required"
        ]);
        Alumne::create($request->all());
        return redirect(route("alumne.index"))
            ->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha afegit correctament!"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumne $alumne)
    {
        $alumne->load("centre", "ensenyament");

        return view("alumne.show", compact("alumne"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumne $alumne)
    {
        $update = true;
        $title = __("Editar alumne");
        $textButton = __("Actualitzar");
        $route = route("alumne.update", ["alumne" => $alumne]);
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        return view("alumne.edit", compact("alumne", "update", "title", "textButton", "route", "centres", "ensenyaments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumne $alumne)
    {
        $request->validate([
            "nom" => "required",
            "cognoms" => "required",
            "data_naixement" => "required|date",
            "centre_id" => "required"
        ]);
        $alumne->update($request->all());
        return back()
            ->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        return back()->with("success", __("L'alumne " . $alumne->nom . " " . $alumne->cognoms . " s'ha eliminat correctament"));
    }
}
