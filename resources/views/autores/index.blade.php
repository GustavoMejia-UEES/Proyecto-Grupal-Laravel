@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Autores</h1>
        <a href="{{ route('autores.create') }}" class="btn btn-primary">Crear Autor</a>

        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autor)
                    <tr>
                        <td>{{ $autor->id }}</td>
                        <td>{{ $autor->nombre }}</td>
                        <td>
                            <a href="{{ route('autores.show', $autor->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
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
