@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Préstamo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="libro_id" class="form-label">Libro</label>
                <select name="libro_id" class="form-select" id="libro_id">
                    @foreach ($libros as $libro)
                        <option value="{{ $libro->id }}" {{ $prestamo->libro_id == $libro->id ? 'selected' : '' }}>{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                <select name="usuario_id" class="form-select" id="usuario_id">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $prestamo->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
                <input type="date" name="fecha_prestamo" class="form-control" id="fecha_prestamo" value="{{ $prestamo->fecha_prestamo }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Préstamo</button>
        </form>
    </div>
@endsection
