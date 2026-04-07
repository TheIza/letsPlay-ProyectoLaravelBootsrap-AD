    @extends('layouts.app')
    {{--
    * Añadir formulario para pagar 
    * arreglar stock, si el stock es 0 no puedo añadir al carrito, si hay 2 y añadp 3 debe tener un maximo
    --}}


    @section("content")

    <div class="container" style="padding: -50px;">
        <header class="d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom" style="margin-top: 100px;">
            <span class="fs-4">
                @auth
                @if(auth()->user()->email === 'admin@admin.com') {{--si eres admin puedes editar crear y borrar--}}
                <h1>
                    <p style="color:  red;">MODO ADMINISTRADOR </p></strong>
                </h1>
                @endif
                @endauth

                <h1><strong>Catálogo de Videojuegos</strong></h1>

            </span>
        </header>
    </div>

    <div class="container mt-5">
        <div>


            @auth
            @if(auth()->user()->email === 'admin@admin.com')
            <a href="{{ route("videojuego.create") }}" class="btn btn-primary">
                Añadir Videojuego
            </a>
        </div>

        @endif

        @endauth
        <div class="row mt-4">
            @forelse($videojuegos as $videojuego)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $videojuego->imagen_url }}" class="card-img-top" alt="{{ $videojuego->nombre }}" style="height: 200px; object-fit: scale-down; padding-top: 20px;">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $videojuego->nombre }}</h5>

                        <p class="card-text"><strong>Género:</strong> {{ $videojuego->genero }}</p>
                        @if($videojuego->stock < 1)

                            <p class="card-text" style="color: red"><strong>No hay en stock</strong></p>
                            @else

                            <p class="card-text"><strong>Stock:</strong> {{ $videojuego->stock }}</p>
                            @endif

                            <div class="mt-auto" style=" justify-content: center; display: flex; gap: 10px;">
                                <a href="{{ route('videojuego.show', $videojuego) }}" style="background-color: rgb(133, 133, 133); border: 1px solid rgb(133, 133, 133); border-radius: 5px; color: white; padding: 10px 20px; text-decoration: none;">
                                    Ver</a>
                                @if($videojuego->stock > 0)
                                <form action="{{ route('carrito.add', $videojuego) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button style="background-color: rgb(255, 140, 0); border: 1px solid rgb(255, 140, 0); border-radius: 5px; color: white; padding: 10px 20px; ">
                                        Añadir al carrito</button>
                                </form>
                                @endif
                                @auth

                                @if(auth()->user()->email === 'admin@admin.com')
                                <a href="{{ route('videojuego.edit', $videojuego) }}" class="btn btn-warning" style="background-color: rgb(255, 193, 7); border: 1px solid rgb(255, 193, 7); border-radius: 5px; color: white; padding: 10px 20px; ">
                                    Editar</a>
                                <form action="{{ route('videojuego.destroy', $videojuego) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Eliminar?')" style="background-color: rgb(199, 36, 4); border: 1px solid rgb(199, 36, 4); border-radius: 5px; color: white; padding: 10px 20px; ">
                                        Eliminar</button>

                                </form>
                                @endif
                                @endauth

                            </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">No hay videojuegos disponibles.</p>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $videojuegos->links() }}
        </div>

    </div>

    @endsection