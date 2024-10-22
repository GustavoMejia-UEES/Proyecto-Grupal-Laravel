@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Préstamo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('prestamos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="libro_id" class="form-label">Libro</label>
                <select name="libro_id" class="form-select" id="libro_id">
                    @foreach ($libros as $libro)
                        <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                <select name="usuario_id" class="form-select" id="usuario_id">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
                <input type="date" name="fecha_prestamo" class="form-control" id="fecha_prestamo" value="{{ old('fecha_prestamo') }}">
            </div>
            <button type="submit" class="btn btn-primary">Crear Préstamo</button>
        </form>
    </div>
@endsection
