<!-- resources/views/inventarios/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventario de Productos</h1>
    <a href="{{ route('inventarios.create') }}" class="btn btn-primary">Agregar Inventario</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Tienda</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventarios as $inventario)
            <tr>
                <td>{{ $inventario->id_inventario }}</td>
                <td>{{ $inventario->producto->nombre }}</td>
                <td>{{ $inventario->cantidad }}</td>
                <td>{{ $inventario->tienda->nombre }}</td>
                <td>
                    <a href="{{ route('inventarios.edit', $inventario->id_inventario) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('inventarios.destroy', $inventario->id_inventario) }}" method="POST" class="d-inline">
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
