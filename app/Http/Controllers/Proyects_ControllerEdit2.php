<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\proyect;
use App\Models\collaborator;

class Proyects_ControllerEdit2 extends Controller
{
    public function index()
    {
        $proyects = proyect::all();
        $clientes = cliente::all();
        $collaborators = collaborator::all();
        return view("proyectsEdit2")->with([
            "proyects" => $proyects,
            "clientes" => $clientes,
            "collaborators" => $collaborators,
        ]);
    }

    public function store(Request $request)
    {
        // Validamos
        $request->validate([
            'nombre_proyecto' => 'required',
            'fecha_inicio' => 'required',
            'fecha_finalizacion' => 'required',
            'prioridad' => 'required',
            'id_colaborador' => 'required',
            'id_colaborador2' => 'required',
            'id_cliente' => 'required',
            'descripcion' => 'required',
            'archivo' => 'required',
        ]);

        // Guardamos
        proyect::create([
            'nombre_proyecto' => $request->nombre_proyecto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_finalizacion' => $request->fecha_finalizacion,
            'prioridad' => $request->prioridad,
            'id_colaborador' => $request->id_colaborador,
            'id_colaborador2' => $request->id_colaborador2,
            'id_cliente' => $request->id_cliente,
            'descripcion' => $request->descripcion,
            'archivo' => $request->archivo,
        ]);

        return redirect()->route("ProyectosVista");
    }

    // public function destruir proyecto
    public function destroy($id)
    {
        $proyect = Proyect::find($id);

        if ($proyect) {
            $proyect->delete();

            return response()
                ->route("ProyectosVista")
                ->with("success")
                ->json(["success" => true]);
        } else {
            return redirect()
                ->route("ProyectosVista")
                ->with("success", "No se pudo encontrar el cliente.");
        }
        return redirect()
            ->route("ProyectosVista")
            ->with("success", "Cliente eliminado exitosamente.");
    }

    public function edit($id)
    {
        // Encontrar el empleado a editar
        $proyect = Proyect::findOrFail($id);

        // Mostrar el formulario de edición con los proyectos asignados
        return view('proyectsEdit2', compact('proyect'));
    }

    public function update(Request $request, $id)
{
    $proyecto = Proyect::findOrFail($id);

    $request->validate([
        'nombre_proyecto' => 'required',
        'fecha_inicio' => 'required',
        'fecha_finalizacion' => 'required',
        'prioridad' => 'required',
        'descripcion' => 'required',
    ]);

    // Actualizar los campos del proyecto
    $proyecto->nombre_proyecto = $request->nombre_proyecto;
    $proyecto->fecha_inicio = $request->fecha_inicio;
    $proyecto->fecha_finalizacion = $request->fecha_finalizacion;
    $proyecto->prioridad = $request->prioridad;
    $proyecto->descripcion = $request->descripcion;

    // Guardar los cambios en la base de datos
    $proyecto->save();

    return redirect()
        ->route("ProyectosVista")
        ->with("success", "Proyecto actualizado exitosamente.");
}

}
