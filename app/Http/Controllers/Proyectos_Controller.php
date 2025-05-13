<?php

namespace App\Http\Controllers;

use App\Models\proyect;
use Illuminate\Http\Request;

class Proyectos_Controller extends Controller
{
    // Mostramos los proyectos
    public function index()
    {
        $proyectsn = proyect::all()->count();
        // Retornamos la vista con los grupos que obtuvimos de la base de datos
        return view('prueba7')->with('proyectsn', $proyectsn);
    }

    // Con este método guardamos los proyectos
    public function store(Request $request)
    {
        // Validamos
        $request->validate([
            'nombre_proyecto' => 'required',
            'fecha_inicio' => 'required',
            'fecha_finalizacion' => 'required',
            'prioridad' => 'required',
            'id_colaborador' => 'required',
            'descripcion' => 'required'
        ]);

        // Guardamos
        proyect::create([
            'nombre_proyecto' => $request->nombre_proyecto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_finalizacion' => $request->fecha_finalizacion,
            'prioridad' => $request->prioridad,
            'id_colaborador' => $request->id_colaborador,
            'descripcion' => $request->descripcion,
        ]);

        // Redireccionamos a la vista de proyectos
        return redirect()->route('ProyectosVista');
    }
}