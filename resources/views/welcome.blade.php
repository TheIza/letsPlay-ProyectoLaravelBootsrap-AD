@extends('layouts.app')

@section('content')

<div class="container mt-5" style=" padding-top: 20px;">
    <div class="text-center p-4 rounded-3" style="background-color: #ffe5b4;">
        <h1>¡Hola, porfavor logeate para poder comprar!</h1>
        <p>Bienvenido a <strong>Let's Play</strong>, todos los juegos que puedas imaginar estan aqui.</p>
    </div>
<div style=" background-color: #ccc;">
    <div id="simpleCarousel" class="carousel slide mt-4" data-bs-ride="carousel" style="max-width: 600px; margin: auto; border: 2px solid #ccc;" >
        <div class="carousel-inner rounded-3" style="overflow: hidden; height: 300px;">
            <div class="carousel-item active text-center">
                <img src="{{ asset('build/assets/images/game1.png') }}" class="d-inline-block" style="max-height: 100%; max-width: 100%;" alt="Juego 1">
            </div>
            <div class="carousel-item text-center">
                <img src="{{ asset('build/assets/images/game2.png') }}" class="d-inline-block" style="max-height: 100%; max-width: 100%;" alt="Juego 2">
            </div>
            <div class="carousel-item text-center">
                <img src="{{ asset('build/assets/images/game3.png') }}" class="d-inline-block" style="max-height: 100%; max-width: 100%;" alt="Juego 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#simpleCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#simpleCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    </div>

    <div class="row mt-4 text-center" >
        <div class="col-md-4 mb-3">
            <div style="background-color: #ffcc80; padding: 20px; border-radius: 10px;">
                <h4>Nuevos Juegos</h4>
                <p>Lanzamientos recientes ~ GTA VI</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div style="background-color: #ffcc80; padding: 20px; border-radius: 10px; ;">
                <h4>Ofertas</h4>
                <p>Juegos con <strong>30%</strong> de descuento por día del padre</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div style="background-color: #ffcc80; padding: 20px; border-radius: 10px; padding-bottom: 32px">
                <h4>Descubre mas en el apartado <a href="videojuego" style="color: black;">videojuegos</a></h4>
                
               
            </div>
        </div>
    </div>
</div>
@endsection