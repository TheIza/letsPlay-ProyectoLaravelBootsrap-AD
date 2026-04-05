<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * enseña la lista de videojuegos que hay en la base de datos, con un maximo de 9 por pagina (para que se vea mejor)
     */
    public function index()
    {
        $videojuegos = Videojuego::paginate(9);
        return view('listaVideoJuegos', compact('videojuegos'));
    }

    /**
     * muestra el formulario para crear un nuevo videojuego
     */
    public function create()
    {
        return view('videojuego.create');
    }

    /**
     * guarda el nuevo videojuego en la base de datos, y antes valida los datos para poder guardarlos
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
     * muestra los detalles de un videojuego mediante su id 
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuego.show', compact('videojuego'));
    }

    /**
     * muestra el formulario para editar un videojuego mediante su id
     */
    public function edit(Videojuego $videojuego)
    {
        return view('videojuego.edit', compact('videojuego'));
    }

    /**
     * actualiza un videojuego en la base de datos mediante el id, y como en el store valida los datos
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
     * borra el videojuego de la base de datos mediante su id
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();

        return redirect()->route('videojuego.index')->with('success', 'Videojuego eliminado correctamente.');
    }
}
