<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'numero_ci' => 'nullable',
            'email' => 'required|email|unique:empleados,email',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/empleados/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Lógica de almacenamiento en la base de datos
        Empleado::create($request->all());

        return redirect('/empleados/confirm');
    }

    public function confirm()
    {
        // Obtén el último empleado de la base de datos y pasa los datos a la vista
        $empleado = Empleado::latest()->first();

        return view('empleados.confirm', compact('empleado'));
    }

    public function storeDocuments(Request $request)
    {
        // Lógica para almacenar documentos
        // ...

        return redirect('/alguna-ruta-despues-de-cargar-documentos');
    }
}
