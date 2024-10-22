@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Autor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('autores.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}">
            </div>
            <button type="submit" class="btn btn-primary">Crear Autor</button>
        </form>
    </div>
@endsection
