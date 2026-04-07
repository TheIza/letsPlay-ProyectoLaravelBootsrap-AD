@extends('layouts.app')

@section('content')
<div class="container mt-5" style="padding-top: 30px;">
    <div class="text-center mb-4">
        <h1>Mi Carrito</h1>
        <p>Aquí puedes revisar tus videojuegos antes de comprarlos.</p>
    </div>

    <table class="table table-bordered" style="table-layout: fixed;">
        <thead class="table-warning">
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Editar cantidad</th>
                <th>Precio</th>

            </tr>
        </thead>
        <tbody>
            @forelse($carrito as $item)
            <tr>
            
                <td>{{ $item->videojuego->nombre }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>
                    <form action="{{ route('carrito.update', $item) }}" method="POST" class="d-inline-flex">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" class="form-control form-control-sm me-1" style="width: 70px;">
                        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                    </form>
                </td>
                <td>${{ number_format($item->videojuego->precio, 2) }}</td>

                <td>
                    <form action="{{ route('carrito.remove', $item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Quitar del carrito</button>
                    </form>
                    
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">
                    <strong>Tu carrito está vacío</strong>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($carrito->count() > 0)
    <br>
    <div class="text-end mb-5">
        <h4>Total: ${{ number_format($carrito->sum(fn($i) => $i->videojuego->precio * $i->cantidad), 2) }}</h4>
        <a href="{{ route('carrito.pagar') }}" class="btn btn-success">Pagar ahora</a>
        
    </div>
    @endif
</div>
@endsection