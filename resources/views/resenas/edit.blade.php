@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Reseña</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('resenas.update', $resena->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="libro_id" class="form-label">Libro</label>
                <select name="libro_id" class="form-select" id="libro_id">
                    @foreach ($libros as $libro)
                        <option value="{{ $libro->id }}" {{ $resena->libro_id == $libro->id ? 'selected' : '' }}>{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                <select name="usuario_id" class="form-select" id="usuario_id">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $resena->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido de la Reseña</label>
                <textarea name="contenido" class="form-control" id="contenido">{{ $resena->contenido }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Reseña</button>
        </form>
    </div>
@endsection
