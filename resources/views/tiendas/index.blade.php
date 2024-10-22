@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Lista de Tiendas</h2>
        <a href="{{ route('tiendas.create') }}" class="btn btn-primary">Agregar Tienda</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiendas as $tienda)
                <tr>
                    <td>{{ $tienda->id_tienda }}</td>
                    <td>{{ $tienda->nombre }}</td>
                    <td>{{ ucfirst($tienda->tipo) }}</td>
                    <td>{{ $tienda->direccion }}</td>
                    <td>{{ $tienda->telefono }}</td>
                    <td>{{ $tienda->email }}</td>
                    <td>
                        <a href="{{ route('tiendas.show', $tienda->id_tienda) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('tiendas.edit', $tienda->id_tienda) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tiendas.destroy', $tienda->id_tienda) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar esta tienda?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

