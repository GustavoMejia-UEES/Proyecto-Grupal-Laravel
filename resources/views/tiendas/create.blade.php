@extends('layouts.app')

@section('content')
    <h2>Agregar Nueva Tienda</h2>

    <form action="{{ route('tiendas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Tienda</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Tienda</label>
            <select class="form-select" id="tipo" name="tipo" required onchange="toggleFields()">
                <option value="" selected disabled>Selecciona el tipo</option>
                <option value="restaurante">Restaurante</option>
                <option value="farmacia">Farmacia</option>
                <option value="supermercado">Supermercado</option>
            </select>
        </div>

        <!-- Campos específicos según el tipo -->
        <div id="restauranteFields" style="display: none;">
            <h4>Información del Restaurante</h4>
            <div class="mb-3">
                <label for="tipo_cocina" class="form-label">Tipo de Cocina</label>
                <input type="text" class="form-control" id="tipo_cocina" name="tipo_cocina">
            </div>
            <div class="mb-3">
                <label for="horario_apertura" class="form-label">Horario de Apertura</label>
                <input type="time" class="form-control" id="horario_apertura" name="horario_apertura">
            </div>
            <div class="mb-3">
                <label for="horario_cierre" class="form-label">Horario de Cierre</label>
                <input type="time" class="form-control" id="horario_cierre" name="horario_cierre">
            </div>
        </div>

        <div id="farmaciaFields" style="display: none;">
            <h4>Información de la Farmacia</h4>
            <div class="mb-3">
                <label for="licencia" class="form-label">Licencia</label>
                <input type="text" class="form-control" id="licencia" name="licencia">
            </div>
            <div class="mb-3">
                <label for="hora_apertura" class="form-label">Hora de Apertura</label>
                <input type="time" class="form-control" id="hora_apertura" name="hora_apertura">
            </div>
            <div class="mb-3">
                <label for="hora_cierre" class="form-label">Hora de Cierre</label>
                <input type="time" class="form-control" id="hora_cierre" name="hora_cierre">
            </div>
        </div>

        <div id="supermercadoFields" style="display: none;">
            <h4>Información del Supermercado</h4>
            <div class="mb-3">
                <label for="secciones" class="form-label">Secciones</label>
                <textarea class="form-control" id="secciones" name="secciones" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="promociones" class="form-label">Promociones</label>
                <textarea class="form-control" id="promociones" name="promociones" rows="3"></textarea>
            </div>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tiendas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script>
        function toggleFields() {
            const tipo = document.getElementById('tipo').value;
            document.getElementById('restauranteFields').style.display = tipo === 'restaurante' ? 'block' : 'none';
            document.getElementById('farmaciaFields').style.display = tipo === 'farmacia' ? 'block' : 'none';
            document.getElementById('supermercadoFields').style.display = tipo === 'supermercado' ? 'block' : 'none';
        }
    </script>
@endsection
