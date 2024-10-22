<!-- resources/views/inventarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Inventario</h1>
    <form action="{{ route('inventarios.update', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select class="form-control" id="producto_id" name="producto_id" required>
                @foreach($productos as $producto)
                <option value="{{ $producto->id }}" {{ $inventario->producto_id == $producto->id ? 'selected' : '' }}>
                    {{ $producto->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tienda_id">Tienda</label>
            <select class="form-control" id="tienda_id" name="tienda_id" required>
                @foreach($tiendas as $tienda)
                <option value="{{ $tienda->id }}" {{ $inventario->tienda_id == $tienda->id ? 'selected' : '' }}>
                    {{ $tienda->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $inventario->cantidad }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
