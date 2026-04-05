@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Mi Carrito</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Juego</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($carrito as $item)
            <tr>
                <td>{{ $item->videojuego->nombre }}</td>
                <td>${{ $item->videojuego->precio }}</td>
                <td>
                    <form action="{{ route('carrito.update', $item) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1">
                        <button type="submit">Actualizar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('carrito.remove', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Tu carrito está vacío</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection