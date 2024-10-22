@extends('layouts.app')

@section('content')
    <h2>Detalles de la Tienda</h2>

    <div class="card">
        <div class="card-header">
            {{ $tienda->nombre }}
        </div>
        <div class="card-body">
            <p><strong>Tipo:</strong> {{ ucfirst($tienda->tipo) }}</p>
            <p><strong>Dirección:</strong> {{ $tienda->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $tienda->telefono }}</p>
            <p><strong>Email:</strong> {{ $tienda->email }}</p>

            @if($tienda->tipo === 'restaurante' && $tienda->restaurante)
                <h4>Información del Restaurante</h4>
                <p><strong>Tipo de Cocina:</strong> {{ $tienda->restaurante->tipo_cocina }}</p>
                <p><strong>Horario de Apertura:</strong> {{ $tienda->restaurante->horario_apertura }}</p>
                <p><strong>Horario de Cierre:</strong> {{ $tienda->restaurante->horario_cierre }}</p>
            @elseif($tienda->tipo === 'farmacia' && $tienda->farmacia)
                <h4>Información de la Farmacia</h4>
                <p><strong>Licencia:</strong> {{ $tienda->farmacia->licencia }}</p>
                <p><strong>Hora de Apertura:</strong> {{ $tienda->farmacia->hora_apertura }}</p>
                <p><strong>Hora de Cierre:</strong> {{ $tienda->farmacia->hora_cierre }}</p>
            @elseif($tienda->tipo === 'supermercado' && $tienda->supermercado)
                <h4>Información del Supermercado</h4>
                <p><strong>Secciones:</strong> {{ $tienda->supermercado->secciones }}</p>
                <p><strong>Promociones:</strong> {{ $tienda->supermercado->promociones }}</p>
            @endif
        </div>
    </div>

    <a href="{{ route('tiendas.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection

