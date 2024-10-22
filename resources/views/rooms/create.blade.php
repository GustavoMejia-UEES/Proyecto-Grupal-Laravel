@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Agregar Nueva Habitación</h2>

        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Habitación</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Habitación</label>
                <select class="form-select" id="tipo" name="tipo" required onchange="toggleFields()">
                    <option value="" selected disabled>Selecciona el tipo</option>
                    <option value="suite">Suite</option>
                    <option value="residencial">Residencial</option>
                    <option value="sencilla">Sencilla</option>
                </select>
            </div>

            <!-- Campos específicos según el tipo -->
            <div id="suiteFields" style="display: none;">
                <h4>Información de la Suite</h4>
                <p>Capacidad: 5 personas</p>
                <p>Precio por noche: $35</p>
            </div>

            <div id="residencialFields" style="display: none;">
                <h4>Información Residencial</h4>
                <p>Capacidad: 10 personas</p>
                <p>Precio por noche: $50</p>
            </div>

            <div id="sencillaFields" style="display: none;">
                <h4>Información de la Habitación Sencilla</h4>
                <p>Capacidad: 1 persona</p>
                <p>Precio por noche: $15</p>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número de Habitación</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required step="0.01">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto de la Habitación</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancelar</a>
            <a href="{{ route('rooms.admin.index') }}" class="btn btn-info">Ver Habitaciones</a> <!-- Ruta hacia el index de admin -->
        </form>
    </div>

    <script>
        function toggleFields() {
            const tipo = document.getElementById('tipo').value;
            document.getElementById('suiteFields').style.display = tipo === 'suite' ? 'block' : 'none';
            document.getElementById('residencialFields').style.display = tipo === 'residencial' ? 'block' : 'none';
            document.getElementById('sencillaFields').style.display = tipo === 'sencilla' ? 'block' : 'none';
        }
    </script>
@endsection
