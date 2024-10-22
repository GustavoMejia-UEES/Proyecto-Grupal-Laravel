@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Reseña</h1>
        <div class="card">
            <div class="card-header">
                Reseña ID: {{ $resena->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Libro: {{ $resena->libro->titulo }}</h5>
                <p class="card-text">Usuario: {{ $resena->usuario->nombre }}</p>
                <p class="card-text">Reseña: {{ $resena->contenido }}</p>
                <a href="{{ route('resenas.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
