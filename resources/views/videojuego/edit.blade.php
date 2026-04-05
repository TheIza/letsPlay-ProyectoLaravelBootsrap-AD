@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Editar Videojuego</h1>

    <form action="{{ route('videojuego.update', $videojuego) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">

            <label for="nombre">Nombre</label>

            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $videojuego->nombre }}" required>

        </div>

        <div class="form-group">

            <label for="genero">Género</label>

            <input type="text" name="genero" id="genero" class="form-control" value="{{ $videojuego->genero }}" required>

        </div>

        <div class="form-group">

            <label for="plataforma">Plataforma</label>

            <input type="text" name="plataforma" id="plataforma" class="form-control" value="{{ $videojuego->plataforma }}" required>

        </div>

        <div class="form-group">

            <label for="fecha_lanzamiento">Fecha de Lanzamiento</label>

            <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" class="form-control" value="{{ $videojuego->fecha_lanzamiento }}" required>

        </div>

        <div class="form-group">

            <label for="precio">Precio</label>

            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ $videojuego->precio }}" required>

        </div>

        <div class="form-group">

            <label for="imagen_url">Imagen URL</label>

            <input type="text" name="imagen_url" id="imagen_url" class="form-control" value="{{ $videojuego->imagen_url }}">

        </div>

        <button type="submit" class="btn btn-primary">Actualizar Videojuego</button>

    </form>

</div>

@endsection