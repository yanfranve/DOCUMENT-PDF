@extends('layouts.app')
{{-- @component('_components.form-input') --}}
@section('content')
    <div class="container">
        <form action="{{ route('document.create', $empleado->id) }}" method="get">

            @csrf


            <!-- Muestra los datos del empleado -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}" readonly>
                    </div>

                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $empleado->apellido }}" readonly>
                </div>

            </div>
        </div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label for="numero_ci">Número de CI:</label>
        <input type="text" class="form-control" id="numero_ci" name="numero_ci" value="{{ $empleado->numero_ci }}" readonly>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="email">Correo Electrónico:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $empleado->email }}" readonly>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $empleado->fecha_nacimiento }}" readonly>
    </div>
</div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $empleado->telefono }}" readonly>
    </div>
</div>
</div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <textarea class="form-control" id="direccion" name="direccion" rows="3" readonly>{{ $empleado->direccion }}</textarea>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Datos del Empleado</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
                    <p><strong>Apellido:</strong> {{ $empleado->apellido }}</p>
                    <p><strong>Email:</strong> {{ $empleado->email }}</p>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3">Seguir</button>
            <a href="/empleados/create" class="btn btn-danger">Volver</a>
        </form>
    </div>
@endsection
