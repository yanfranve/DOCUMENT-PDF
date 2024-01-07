@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Bienvenido al Registro y Cargas de Documentos para Empleados</h1>
                <p class="mt-3">
                    Aquí puedes encontrar información sobre el registro y carga de documentos para empleados.
                </p>
                <a href="{{ route('empleados.create') }}" class="btn btn-primary mt-3">Ir a Registro y Cargas</a>
            </div>
        </div>
    </div>
@endsection
