@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $categoria->nombre }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
        </form>
    </div>
@endsection
