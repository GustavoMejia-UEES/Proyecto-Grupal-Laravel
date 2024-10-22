<!-- resources/views/inventarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Inventario</h1>
        <form action="{{ route('inventarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_producto">Producto</label>
                <select class="form-control" id="producto_id" name="id_producto" required>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tienda">Tienda</label>
                <select class="form-control" id="tienda_id" name="id_tienda" required>
                    @foreach ($tiendas as $tienda)
                        <option value="{{ $tienda->id_tienda }}">{{ $tienda->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
@endsection
