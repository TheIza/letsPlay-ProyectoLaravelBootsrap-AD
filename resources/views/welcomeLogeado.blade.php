@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-5 text-center rounded-3">
        <img src="https://i.pinimg.com/736x/47/9b/59/479b59dca59037dc7c706000d4cddb7e.jpg" width="500">
        <h1 class="mt-4">Bienvenido de nuevo, {{ Auth::user()->name }}</h1>
        <p class="lead">Encuentra tus videojuegos favoritos y accede a tu catálogo.</p>
    </div>
</div>
@endsection