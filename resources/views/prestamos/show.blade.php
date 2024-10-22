@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Préstamo</h1>
        <div class="card">
            <div class="card-header">
                Préstamo ID: {{ $prestamo->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Libro: {{ $prestamo->libro->titulo }}</h5>
                <p class="card-text">Usuario: {{ $prestamo->usuario->nombre }}</p>
                <p class="card-text">Fecha de Préstamo: {{ $prestamo->fecha_prestamo }}</p>
                <a href="{{ route('prestamos.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
