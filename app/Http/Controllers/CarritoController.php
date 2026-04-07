<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    // Mostrar el carrito del usuario
    public function index()
    {
        // Obtenemos todos los items del carrito del usuario con sus videojuegos
        $carrito = Carrito::with('videojuego')
            ->where('user_id', Auth::id())
            ->get();

        // Devolvemos la vista del carrito pasando los items
        return view('carrito', compact('carrito'));
    }

    // Añadir un videojuego al carrito
    public function add(Videojuego $videojuego)
    {
        // Si no hay stock, volvemos atrás
        if ($videojuego->stock <= 0) {
            return redirect()->back();
        }

        // Buscamos si ya está en el carrito
        $item = Carrito::where('user_id', Auth::id())
            ->where('videojuego_id', $videojuego->id)
            ->first();

        if ($item) {
            // Si ya está, aumentamos la cantidad en 1
            $item->cantidad = $item->cantidad + 1;
            $item->save();
        } else {
            // Si no está, lo creamos con cantidad 1
            $carrito = new Carrito();
            $carrito->user_id = Auth::id();
            $carrito->videojuego_id = $videojuego->id;
            $carrito->cantidad = 1;
            $carrito->save();
        }

        // Restamos stock del videojuego
        $videojuego->stock = $videojuego->stock - 1;
        $videojuego->save();

        return redirect()->back();
    }

    // Actualizar la cantidad de un item del carrito
    public function update(Request $request, Carrito $carrito)
    {
        // Validamos que la cantidad sea un número entero mínimo 1
        $request->validate([
            "cantidad" => "required|integer|min:1"
        ]);

        // Comprobamos si la cantidad que pide el usuario supera el stock disponible
        if ($request->cantidad > $carrito->videojuego->stock) {
            return back()->with("error", "Stock máximo alcanzado");
        }

        // Actualizamos la cantidad del carrito
        $carrito->update([
            "cantidad" => $request->cantidad
        ]);

        return back()->with("success", "Cantidad actualizada correctamente");
    }

    // Eliminar un videojuego del carrito
    public function remove(Carrito $carrito)
    {
        // Obtenemos el videojuego relacionado
        $videojuego = $carrito->videojuego;

        if ($videojuego) {
            // Añadimos de nuevo al stock la cantidad que estaba en el carrito
            $videojuego->stock += $carrito->cantidad;
            $videojuego->save();
        }

        // Borramos el item del carrito
        $carrito->delete();

        return redirect()->back()->with('success', 'Videojuego eliminado del carrito.');
    }

    // Mostrar la vista de pago
    public function pagar(Carrito $carrito)
    {
        // Pasamos el carrito a la vista de pago
        return view('carrito.pagar', compact('carrito'));
    }

   
    // Procesar el pago
    public function procesar(Request $request)
    {
        // Obtenemos todos los items del carrito del usuario actual
        $carritoItems = Carrito::where('user_id', Auth::id())->get();

        // Recorremos cada item del carrito
        foreach ($carritoItems as $item) {
            $videojuego = $item->videojuego;
            
            // Eliminamos el item del carrito
            $item->delete();
        }

        // Redirigimos de vuelta con mensaje de éxito
        return redirect()->back()->with('success', 'Pago realizado correctamente!');
    }
}
