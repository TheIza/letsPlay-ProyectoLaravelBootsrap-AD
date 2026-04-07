@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">
<br>
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <br>
    <h2>Formulario de pago</h2>
   

    <form action="{{ route('pago.procesar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Tarjeta</label>
            <input type="text" name="tarjeta" class="form-control" required>
        </div>

        <div class="form-group">
            <label>CVV</label>
            <input type="text" name="cvv" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Titular</label>
            <input type="text" name="titular" class="form-control" required>
        </div>

        

        <br>

        <button type="submit" class="btn btn-success">Pagar</button>

        <br><br>

        <a href="{{ route('videojuego.index') }}"
            style="color: white; background-color: red; padding: 8px; text-decoration: none;">
            VOLVER
        </a>

    </form>

</div>

@endsection