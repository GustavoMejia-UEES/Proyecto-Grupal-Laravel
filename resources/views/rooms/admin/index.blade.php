<!-- resources/views/rooms/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Habitaciones</h2>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Agregar Nueva Habitación</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Número</th>
                    <th>Capacidad</th>
                    <th>Precio</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->nombre }}</td>
                        <td>{{ $room->tipo }}</td>
                        <td>{{ $room->descripcion }}</td>
                        <td>{{ $room->numero }}</td>
                        <td>{{ $room->capacidad }}</td>
                        <td>${{ number_format($room->precio, 2) }}</td>
                        <td><img src="{{ asset($room->foto) }}" alt="{{ $room->nombre }}" style="width: 100px;"></td>
                        <td>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
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
