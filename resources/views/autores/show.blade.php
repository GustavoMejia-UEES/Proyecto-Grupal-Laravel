@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Autor</h1>
        <div class="card">
            <div class="card-header">
                Autor ID: {{ $autor->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $autor->nombre }}</h5>
                <a href="{{ route('autores.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
