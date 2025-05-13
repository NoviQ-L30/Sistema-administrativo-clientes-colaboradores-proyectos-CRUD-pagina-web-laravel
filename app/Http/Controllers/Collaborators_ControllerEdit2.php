<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\collaborator;

class Collaborators_ControllerEdit2 extends Controller
{
    //ESTE CONTROLADOR ES PARA LA FUNCION DE BORRAR
    public function index()
    {
        $collaborators = collaborator::all();
        return view("collaboratorsEdit2")->with([
            "collaborators" => $collaborators,
        ]);
    }

    public function store(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'fecha_ingreso' => 'required',
            'telefono' => 'required',
            'company' => 'required',
            'departamento' => 'required',
            'designacion' => 'required',
            'imagen' => 'required',
        ]);

        // Guardamos los datos en la BD
        collaborator::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'fecha_ingreso' => $request->fecha_ingreso,
            'telefono' => $request->telefono,
            'company' => $request->company,
            'departamento' => $request->departamento,
            'designacion' => $request->designacion,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route("CollaboratorsVista");
    }

    // public function destruir cliente
    public function destroy($id)
    {
        $collaborator = Collaborator::find($id);

        if ($collaborator) {
            $collaborator->delete();

            return response()
                ->route("collaboratorsVista")
                ->with("success")
                ->json(["success" => true]);
        } else {
            return redirect()
                ->route("collaboratorsVista")
                ->with("success", "No se pudo encontrar el cliente.");
        }
        return redirect()
            ->route("collaboratorsVista")
            ->with("success", "Cliente eliminado exitosamente.");
    }

    public function edit($id)
    {
        // Encontrar el empleado a editar
        $collaborator = Collaborator::findOrFail($id);

        // Mostrar el formulario de edición con los proyectos asignados
        return view('collaboratorsEdit2', compact('collaborator'));
    }

    public function update(Request $request, $id)
{
    $collaborator = Collaborator::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'apellido' => 'required',
        'username' => 'required',
        'email' => 'required',
        'fecha_ingreso' => 'required',
        'telefono' => 'required',
        'company' => 'required',
        'departamento' => 'required',
        'designacion' => 'required',
    ]);

    // Actualizar los campos del colaborador
    $collaborator->name = $request->name;
    $collaborator->apellido = $request->apellido;
    $collaborator->username = $request->username;
    $collaborator->email = $request->email;
    $collaborator->fecha_ingreso = $request->fecha_ingreso;
    $collaborator->telefono = $request->telefono;
    $collaborator->company = $request->company;
    $collaborator->departamento = $request->departamento;
    $collaborator->designacion = $request->designacion;

    // Guardar los cambios en la base de datos
    $collaborator->save();

    return redirect()
        ->route("CollaboratorsVista")
        ->with("success", "Colaborador actualizado exitosamente.");
}

}
