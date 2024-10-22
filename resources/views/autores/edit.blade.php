@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Autor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('autores.update', $autor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $autor->nombre }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Autor</button>
        </form>
    </div>
@endsection
