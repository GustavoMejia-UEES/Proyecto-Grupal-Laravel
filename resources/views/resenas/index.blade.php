@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Reseñas</h1>
        <a href="{{ route('resenas.create') }}" class="btn btn-primary">Crear Reseña</a>

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
                    <th>Reseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resenas as $resena)
                    <tr>
                        <td>{{ $resena->id }}</td>
                        <td>{{ $resena->libro->titulo }}</td>
                        <td>{{ $resena->usuario->nombre }}</td>
                        <td>{{ $resena->contenido }}</td>
                        <td>
                            <a href="{{ route('resenas.show', $resena->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('resenas.edit', $resena->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('resenas.destroy', $resena->id) }}" method="POST" style="display:inline;">
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
