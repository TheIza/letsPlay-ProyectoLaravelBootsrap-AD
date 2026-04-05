<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = Carrito::with('videojuego')
                    ->where('user_id', Auth::id())
                    ->get();

        return view('carrito', compact('carrito'));
    }

    public function add(Videojuego $videojuego)
    {
        $item = Carrito::where('user_id', Auth::id())
                    ->where('videojuego_id', $videojuego->id)
                    ->first();

        if ($item) {
            $item->increment('cantidad');
        } else {
            Carrito::create([
                'user_id' => Auth::id(),
                'videojuego_id' => $videojuego->id,
                'cantidad' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Videojuego añadido al carrito.');
    }

    public function update(Request $request, Carrito $carrito)
    {
        $carrito->update([
            'cantidad' => $request->cantidad
        ]);

        return redirect()->back()->with('success', 'Cantidad actualizada.');
    }

    public function remove(Carrito $carrito)
    {
        $carrito->delete();

        return redirect()->back()->with('success', 'Videojuego eliminado del carrito.');
    }
}