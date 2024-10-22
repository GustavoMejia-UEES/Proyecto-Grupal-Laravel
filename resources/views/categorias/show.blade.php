@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Categoría</h1>
        <div class="card">
            <div class="card-header">
                Categoría ID: {{ $categoria->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $categoria->nombre }}</h5>
                <a href="{{ route('categorias.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
