<!-- resources/views/categorias/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar Categoría</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id_categoria }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <!-- El ID se pasa correctamente aquí -->
                            <a href="{{ route('categorias.edit', ['categoria' => $categoria->id_categoria]) }}"
                                class="btn btn-warning">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" class="d-inline">
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
