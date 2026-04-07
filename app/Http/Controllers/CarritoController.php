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
// si el videojuego ya esta en el carrito se augmenta la cantidad, 
// si quieres añadir mas de lo que hay en stock te pone el maximo que hay posible

    public function add(Videojuego $videojuego)     
    {
        $item = Carrito::where('user_id', Auth::id())
            ->where('videojuego_id', $videojuego->id)
            ->first();

        if ($item) {
            $nuevaCantidad = $item->cantidad + 1;

            if ($nuevaCantidad > $videojuego->stock) {
                return redirect()->back();
            }

            $item->cantidad = $nuevaCantidad;
            $item->save();
        } else {
            if ($videojuego->stock == 0) {
                return redirect()->back();
            }

            Carrito::create([
                'user_id' => Auth::id(),
                'videojuego_id' => $videojuego->id,
                'cantidad' => 1
            ]);
        }

        return redirect()->back();
    }

    // si quieres añadir una cantidad mayor a la que hay en stock te pone el maximo que hay posible y sino excedes el maximo te pone la cantidad que queires
    public function update(Request $request, Carrito $carrito)
{
    $request->validate([
        "cantidad" => "required|integer|min:1"
    ]);

    if ($request->cantidad > $carrito->videojuego->stock) {
        return back()->with("error", "Stock máximo alcanzado");
    }

    $carrito->update([
        "cantidad" => $request->cantidad
    ]);

    return back()->with("success", "Cantidad actualizada correctamente");
}

    public function remove(Carrito $carrito)
    {
        $carrito->delete();

        return redirect()->back()->with('success', 'Videojuego eliminado del carrito.');
    }
}
