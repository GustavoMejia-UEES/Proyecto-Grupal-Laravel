<!-- resources/views/productos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>

        <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" class="form-control" value="{{ $producto->precio }}" required>
            </div>

            <div class="form-group">
                <label for="unidad_medida">Unidad de Medida</label>
                <input type="text" name="unidad_medida" class="form-control" value="{{ $producto->unidad_medida }}"
                    required>
            </div>

            <div class="form-group">
                <label for="id_categoria">Categoría</label>
                <select name="id_categoria" class="form-control" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}"
                            {{ $categoria->id_categoria == $producto->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tienda_id">Tienda</label>
                <select name="tienda_id" class="form-control" required>
                    @foreach ($tiendas as $tienda)
                        <option value="{{ $tienda->id }}" {{ $tienda->id == $producto->tienda_id ? 'selected' : '' }}>
                            {{ $tienda->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
@endsection
