@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">

    <h1>{{ $videojuego->nombre }}</h1>

    <p><strong>Género:</strong> {{ $videojuego->genero }}</p>

    <p><strong>Plataforma:</strong> {{ $videojuego->plataforma }}</p>

    <p><strong>Fecha de Lanzamiento:</strong> {{ $videojuego->fecha_lanzamiento }}</p>

    <p><strong>Precio:</strong> {{ $videojuego->precio }} €</p>


    <img src="{{ $videojuego->imagen_url }}" alt="Imagen del videojuego" width="200">

    <br> <br>

    @if($videojuego->stock < 1)
        <p style="color: red"><strong>No hay en stock</strong></p>

        @else
        <p style="color: red"><strong>Stock: </strong> {{ $videojuego->stock }}</p>
        @endif
        <br><br>

        <a href="{{ route('videojuego.index') }}" class="btn btn-secondary">Volver</a>

</div>

@endsection