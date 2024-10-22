@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Préstamos</h1>
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Crear Préstamo</a>

        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>Fecha de Préstamo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->libro->titulo }}</td>
                        <td>{{ $prestamo->usuario->nombre }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>
                            <a href="{{ route('prestamos.show', $prestamo->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
