<?php

namespace App\Http\Controllers;

use App\Models\proyect;
use App\Models\collaborator;
use Illuminate\Http\Request;
use App\Models\cliente;

class Proyects_Controller extends Controller
{
    // Mostramos los proyectos
    public function index()
    {
        $proyects = proyect::all();
        $collaborators = collaborator::all();
        $clientes = cliente::all();
        // Retornamos la vista con los grupos que obtuvimos de la base de datos
        return view('auth.prueba')->with([
            'proyects' => $proyects,
            'clientes' => $clientes,
        'collaborators' => $collaborators]);
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
            'descripcion' => 'required',
            'id_colaborador2' => 'required',
            'id_cliente' => 'required',
            'archivo' => 'required',
        ]);

        // Guardamos
        proyect::create([
            'nombre_proyecto' => $request->nombre_proyecto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_finalizacion' => $request->fecha_finalizacion,
            'prioridad' => $request->prioridad,
            'id_colaborador' => $request->id_colaborador,
            'descripcion' => $request->descripcion,
            'id_colaborador2' => $request->id_colaborador2,
            'id_cliente' => $request->id_cliente,
            'archivo' => $request->archivo,
        ]);

        // Redireccionamos a la vista de proyectos
        return redirect()->route('ProyectosVista');
    }

    public function destroy(Request $request, proyect $proyecto)
    {

        // Eliminamos el proyecto
        $proyecto->delete();

        return back()->with('mensaje', 'Comentario ELIMINADO');
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre_proyecto' => 'required',
            'client' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'required|date',
            'prioridad' => 'required',
            'id_colaborador' => 'required',
            'id_colaborador2' => 'required',
            'id_cliente' => 'required',
            'descripcion' => 'required',
        ]);
    
        $proyecto->update($request->all());
    
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado exitosamente.');
    }

}