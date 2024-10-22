@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Habitaciones</h2>

    <div class="row">
        @foreach($rooms as $room)
            <div class="col-md-4 d-flex">
                <div class="card mb-4 flex-fill">
                    <img src="{{ asset('storage/' . $room->foto) }}" class="card-img-top" alt="{{ $room->nombre }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $room->nombre }}</h5>
                        <p class="card-text">{{ $room->descripcion }}</p>
                        <p><strong>Tipo:</strong> {{ ucfirst($room->tipo) }}</p>
                        <p><strong>Número:</strong> {{ $room->numero }}</p>
                        <p><strong>Capacidad:</strong> {{ $room->capacidad }} personas</p>
                        <p><strong>Precio por noche:</strong> ${{ number_format($room->precio, 2) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('rooms.reserve', $room->id) }}" class="btn btn-primary">Reservar</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary">Ir al Menú Principal</a>
    </div>
</div>
@endsection
