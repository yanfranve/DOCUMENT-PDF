@extends('layouts.app')

@section('content')
    <div class="container">
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

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="file">Seleccionar Documento (PDF):</label>
                <input type="file" class="form-control-file" name="file" id="file" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar Documento</button>
        </form>
    </div>
@endsection
