@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Usuario</h1>
        <div class="card">
            <div class="card-header">
                Usuario ID: {{ $usuario->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $usuario->nombre }}</h5>
                <p class="card-text">Email: {{ $usuario->email }}</p>
                <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
