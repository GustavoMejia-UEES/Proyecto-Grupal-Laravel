@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Libros</h1>
        <a href="{{ route('libros.create') }}" class="btn btn-primary">Crear Libro</a>

        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->id }}</td>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor->nombre }}</td>
                        <td>{{ $libro->categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
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
