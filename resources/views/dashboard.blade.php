@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <!-- Opción Crear Habitaciones -->
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Crear Habitaciones</h5>
                    <p class="card-text">Añade nuevas habitaciones al hotel.</p>
                    <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                        Crear
                    </a>
                </div>
            </div>
        </div>

        <!-- Opción Modificar Reservas -->
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Modificar Reservas</h5>
                    <p class="card-text">Gestiona y modifica las reservas existentes.</p>
                    <a href="{{ route('reservations.index') }}" class="btn btn-warning">
                        Modificar
                    </a>
                </div>
            </div>
        {{-- </div>

        <!-- Opción Ver Clientes -->
        {{-- <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Ver Clientes</h5>
                    <p class="card-text">Consulta la información de los clientes.</p>
                    <a href="{{ route('clients.index') }}" class="btn btn-success">
                        Ver
                    </a>
                </div>
            </div>
        </div> --}}
    </div> 
</div>
@endsection
