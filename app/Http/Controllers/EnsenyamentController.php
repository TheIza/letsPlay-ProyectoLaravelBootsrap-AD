<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ensenyament;

class EnsenyamentController extends Controller
{
    public function index()
    {
        $ensenyaments = Ensenyament::paginate(10);

        return view("ensenyament", compact("ensenyaments"));
    }

    public function create()
    {
        $ensenyament = new Ensenyament;

        $title = __("Afegir ensenyament");
        $textButton = __("Afegir");
        $route = route("ensenyament.store");

        return view("ensenyament.create",
            compact("ensenyament","title","textButton","route"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required"
        ]);

        Ensenyament::create($request->all());

        return redirect(route("ensenyament.index"))
            ->with("success",
                __("L'ensenyament " . $request->nom . " s'ha afegit correctament!")
            );
    }

    public function edit(Ensenyament $ensenyament)
    {
        $update = true;

        $title = __("Editar ensenyament");
        $textButton = __("Actualitzar");
        $route = route("ensenyament.update", ["ensenyament" => $ensenyament]);

        return view("ensenyament.edit",
            compact("ensenyament","update","title","textButton","route"));
    }

    public function update(Request $request, Ensenyament $ensenyament)
    {
        $request->validate([
            "nom" => "required"
        ]);

        $ensenyament->update($request->all());

        return back()
            ->with("success",
                __("L'ensenyament " . $request->nom . " s'ha actualitzat correctament!")
            );
    }

    public function destroy(Ensenyament $ensenyament)
    {
        $ensenyament->delete();

        return back()
            ->with("success",
                __("L'ensenyament " . $ensenyament->nom . " s'ha eliminat correctament")
            );
    }
}