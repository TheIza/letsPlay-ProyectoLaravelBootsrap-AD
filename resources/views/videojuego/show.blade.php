@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">

    <h1>{{ $videojuego->nombre }}</h1>

    <p><strong>Género:</strong> {{ $videojuego->genero }}</p>

    <p><strong>Plataforma:</strong> {{ $videojuego->plataforma }}</p>

    <p><strong>Fecha de Lanzamiento:</strong> {{ $videojuego->fecha_lanzamiento }}</p>

    <p><strong>Precio:</strong> {{ $videojuego->precio }} €</p>

    @if($videojuego->imagen_url)

        <img src="{{ $videojuego->imagen_url }}" alt="Imagen del videojuego" width="200">

    @endif

    <br><br>

    <a href="{{ route('videojuego.index') }}" class="btn btn-secondary">Volver</a>

   

</div>

@endsection