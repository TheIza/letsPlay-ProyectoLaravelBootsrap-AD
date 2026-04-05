@extends('layouts.app')

@section('content')

<div class="container">

    <h1>{{ $videojuego->nombre }}</h1>

    <p><strong>Género:</strong> {{ $videojuego->genero }}</p>

    <p><strong>Plataforma:</strong> {{ $videojuego->plataforma }}</p>

    <p><strong>Fecha de Lanzamiento:</strong> {{ $videojuego->fecha_lanzamiento }}</p>

    <p><strong>Precio:</strong> {{ $videojuego->precio }} €</p>

    @if($videojuego->imagen_url)

        <img src="{{ $videojuego->imagen_url }}" alt="Imagen del videojuego" width="200">

    @endif

    <br><br>

    <a href="{{ route('videojuego.index') }}" class="btn btn-secondary">Volver a la lista</a>

    <a href="{{ route('videojuego.edit', $videojuego) }}" class="btn btn-warning">Editar</a>

</div>

@endsection