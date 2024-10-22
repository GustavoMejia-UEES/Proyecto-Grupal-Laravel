@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1>Bienvenido a nuestro Hotel</h1>
            <p>Elige una opción:</p>

            <div class="mt-4">
                <a href="{{ route('rooms.index') }}" class="btn btn-primary btn-lg">Cliente</a>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg">Administrador</a>
            </div>
        </div>
    </div>
</div>
@endsection
