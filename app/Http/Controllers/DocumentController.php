<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Empleado;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DocumentController extends Controller
{
    public function create($empleadoId)
    {
        $empleado = Empleado::findOrFail($empleadoId);
        return view('documents.create', compact('empleado'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = 'documents/' . $fileName;

        // Mueve el archivo a la carpeta storage/app/documents
        $file->storeAs('documents', $fileName);

        // Convierte el archivo a PDF usando Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('defaultFont', 'Arial');
        $options->set('defaultCharset', 'UTF-8');

        $dompdf = new Dompdf($options);

        // Verifica la existencia del archivo antes de intentar abrirlo
        if (file_exists(storage_path('app/' . $filePath))) {
            $htmlContent = file_get_contents(storage_path('app/' . $filePath));
            $dompdf->loadHtml($htmlContent, 'UTF-8');
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Almacena la URL del documento en la base de datos
            $document = Document::create([
                'name' => $fileName,
                'file_path' => $filePath,
            ]);

            return redirect()->route('document.show', $document->id);
        } else {
            // Manejar el caso en el que el archivo no existe
            return redirect()->route('documents.create')->with('error', 'El archivo no existe.');
        }
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);

        // Mostrar el contenido del archivo PDF en el visor del navegador
        return view('documents.show', ['document' => $document]);
    }

    public function viewPDF($id)
    {
        $document = Document::findOrFail($id);

        // Cargar el contenido del archivo PDF
        $fileContent = file_get_contents(storage_path('app/' . $document->file_path));

        // Mostrar el contenido del archivo PDF en el visor del navegador
        return response($fileContent, 200)->header('Content-Type', 'application/pdf');
    }

    public function save($id)
    {
        $document = Document::findOrFail($id);
        $empleado = Auth::user()->empleado;
        $empleado->documentos()->save($document);
        $filePath = storage_path('app/' . $document->file_path);

        return response()->download($filePath, $document->name);
    }

    public function delete($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->route('documents.create')->with('success', 'Documento borrado correctamente.');
    }
}
