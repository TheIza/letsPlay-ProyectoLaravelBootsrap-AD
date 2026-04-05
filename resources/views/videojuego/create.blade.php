@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">

    <h1>Crear Videojuego</h1>

    <form action="{{ route('videojuego.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label for="nombre">Nombre</label>

            <input type="text" name="nombre" id="nombre" class="form-control" required>

        </div>

        <div class="form-group">

            <label for="genero">Género</label>

            <input type="text" name="genero" id="genero" class="form-control" required>

        </div>

        <div class="form-group">

            <label for="plataforma">Plataforma</label>

            <input type="text" name="plataforma" id="plataforma" class="form-control" required>

        </div>

        <div class="form-group">

            <label for="fecha_lanzamiento">Fecha de Lanzamiento</label>

            <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" class="form-control" required>

        </div>

        <div class="form-group">

            <label for="precio">Precio</label>

            <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>

        </div>

        <div class="form-group">

            <label for="imagen_url">Imagen URL</label>

            <input type="text" name="imagen_url" id="imagen_url" class="form-control">

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear Videojuego</button>
<br>
<br>
         <a href="{{ route('videojuego.index') }}" style="color: white; border: 1px solid red; background-color: red; border-radius: 5px; padding: 8px; text-decoration: none;" >VOLVER</a>

    </form>

</div>

@endsection