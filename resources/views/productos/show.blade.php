<!-- resources/views/productos/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $producto->nombre }}</h5>
            <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
            <p class="card-text"><strong>Unidad de Medida:</strong> {{ $producto->unidad_medida }}</p>
            <p class="card-text"><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
            <p class="card-text"><strong>Tienda:</strong> {{ $producto->tienda->nombre }}</p>
        </div>
    </div>

    <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-4">Volver a la lista de productos</a>
</div>
@endsection
