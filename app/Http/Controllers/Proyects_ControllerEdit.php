<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\proyect;

class Proyects_ControllerEdit extends Controller
{
    public function index()
    {
        $proyects = proyect::all();
        $clientes = cliente::all();
        return view("proyectsEdit")->with([
            "proyects" => $proyects,
            "clientes" => $clientes,
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
        return route("proyects.edit", compact("proyect"));
    }
}
