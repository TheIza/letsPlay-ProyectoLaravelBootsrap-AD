    @extends('layouts.app')
{{--
 * TODO añadir url a los productos
* arreglar login y register
* hacer que si eres admin puedas eliminar editar y añadir los productos pero si no eres admin solo puedas verlos
* hacer carrito de compra
* mejorar diseño - buscar ideas
* arreglar navs
--}}


    @section("content")

    <div class="container">
        <header class="d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom" style="margin-top: 100px;">
            <span class="fs-4">
                <h1><strong>Catálogo de Videojuegos</strong></h1>
            </span>
        </header>
    </div>

    <div class="container mt-5">
        <div class="text-center">
           

            <a href="{{ route("videojuego.create") }}" class="btn btn-primary">
                Añadir Videojuego
            </a>
        </div>

<div class="row mt-4">
        @forelse($videojuegos as $videojuego)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($videojuego->imagen_url)
                        <img src="{{ $videojuego->imagen_url }}" class="card-img-top" alt="{{ $videojuego->nombre }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sin imagen">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $videojuego->nombre }}</h5>
                        <p class="card-text"><strong>Género:</strong> {{ $videojuego->genero }}</p>
                        <p class="card-text"><strong>Plataforma:</strong> {{ $videojuego->plataforma }}</p>
                        <p class="card-text"><strong>Fecha de lanzamiento:</strong> {{ $videojuego->fecha_lanzamiento }}</p>
                        <p class="card-text"><strong>Precio:</strong> {{ $videojuego->precio }} €</p>
                        <div class="mt-auto">
                            <a href="{{ route('videojuego.show', $videojuego) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('videojuego.edit', $videojuego) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('videojuego.destroy', $videojuego) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No hay videojuegos</p>
            </div>
        @endforelse
    </div>

        <div class="d-flex justify-content-center">
            {{ $videojuegos->links() }}
        </div>

    </div>

    @endsection