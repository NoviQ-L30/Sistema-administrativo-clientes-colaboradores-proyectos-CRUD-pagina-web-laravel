<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyect;
use App\Models\collaborator;
use App\Models\pago;

class Pagos_Controller extends Controller
{
    public function index()
    {
        // Aquí puedes obtener la información necesaria para mostrar en la vista
        // Por ejemplo, podrías obtener los proyectos y colaboradores relacionados con los pagos

        $proyects = proyect::all();
        $collaborators = collaborator::all();

        return view('VistaPago', compact('proyects', 'collaborators'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'id_proyecto' => 'required',
            'id_colaboradorE' => 'required',
            'pago' => 'required',
        ]);

        // Guardar los datos en la BD
        Pago::create([
            'id_proyecto' => $request->id_proyecto,
            'id_colaboradorE' => $request->id_colaboradorE,
            'pago' => $request->pago,
        ]);

        // Redireccionar a la vista que desees
        return redirect()->route('ruta.nombre');
    }
}
