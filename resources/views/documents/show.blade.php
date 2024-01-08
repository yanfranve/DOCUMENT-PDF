@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Muestra el documento PDF en el visor del navegador -->
        <div class="embed-responsive embed-responsive-4by3">
            <iframe class="embed-responsive-item" src="{{ route('documents.view', $document->id) }}"></iframe>
        </div>

        <!-- Agrega botones para guardar o borrar -->
        <form action="{{ route('document.save', $document->id) }}" method="post" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <form action="{{ route('document.delete', $document->id) }}" method="post" class="mt-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </div>

    <!-- Coloca aquí el código adicional que quieras incluir en la sección content -->
@endsection
