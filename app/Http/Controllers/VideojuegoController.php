<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videojuegos = Videojuego::paginate(9);
        return view('listaVideoJuegos', compact('videojuegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuego.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'plataforma' => 'required|string|max:255',
            'fecha_lanzamiento' => 'required|date',
            'precio' => 'required|numeric',
            'imagen_url' => 'nullable|string|max:255',
        ]);

        Videojuego::create($request->all());

        return redirect()->route('videojuego.index')->with('success', 'Videojuego creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuego.show', compact('videojuego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        return view('videojuego.edit', compact('videojuego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'plataforma' => 'required|string|max:255',
            'fecha_lanzamiento' => 'required|date',
            'precio' => 'required|numeric',
            'imagen_url' => 'nullable|string|max:255',
        ]);

        $videojuego->update($request->all());

        return redirect()->route('videojuego.index')->with('success', 'Videojuego actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();

        return redirect()->route('videojuego.index')->with('success', 'Videojuego eliminado correctamente.');
    }
}
