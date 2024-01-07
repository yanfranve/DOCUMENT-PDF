<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Documento</title>
</head>
<body>

<!-- Muestra el documento PDF en el visor del navegador -->
<iframe src="{{ route('documents.view', $document->id) }}" width="100%" height="500px"></iframe>

<!-- Agrega botones para guardar o borrar -->
<form action="{{ route('document.save', $document->id) }}" method="post">
    @csrf
    <button type="submit">Guardar</button>
</form>

<form action="{{ route('document.delete', $document->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Borrar</button>
</form>

</body>
</html>
