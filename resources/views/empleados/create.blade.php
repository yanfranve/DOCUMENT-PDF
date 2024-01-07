@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/empleados/store" method="post">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>

            <div class="form-group">
                <label for="numero_ci">Número de CI:</label>
                <input type="text" class="form-control" id="numero_ci" name="numero_ci">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Siguiente</button>
        </form>
    </div>
@endsection
