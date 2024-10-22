@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Libro</h1>
        <div class="card">
            <div class="card-header">
                Libro ID: {{ $libro->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Título: {{ $libro->titulo }}</h5>
                <p class="card-text">Autor: {{ $libro->autor->nombre }}</p>
                <p class="card-text">Categoría: {{ $libro->categoria->nombre }}</p>
                <a href="{{ route('libros.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
