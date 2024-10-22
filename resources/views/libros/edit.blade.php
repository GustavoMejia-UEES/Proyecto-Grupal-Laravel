@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Libro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libros.update', $libro->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $libro->titulo }}">
            </div>
            <div class="mb-3">
                <label for="autor_id" class="form-label">Autor</label>
                <select name="autor_id" class="form-select" id="autor_id">
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}" {{ $libro->autor_id == $autor->id ? 'selected' : '' }}>{{ $autor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" class="form-select" id="categoria_id">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Libro</button>
        </form>
    </div>
@endsection
