<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class Clientes_ControllerEdit extends Controller
{
    //ESTE CONTROLADOR ES PARA LA FUNCION DE BORRAR
    public function index()
    {
        $clientes = cliente::all();
        return view("clientesEdit")->with([
            "clientes" => $clientes,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "apellido" => "required",
            "username" => "required",
            "email" => "required",
            "password" => "required",
            "telefono" => "required",
            "nombre_empresa" => "required",
            "imagen" => "required",
        ]);

        cliente::create([
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "username" => $request->username,
            "email" => $request->email,
            "password" => $request->password,
            "telefono" => $request->telefono,
            "nombre_empresa" => $request->nombre_empresa,
            "imagen" => $request->imagen,
        ]);

        return redirect()->route("ClientesN");
    }

    // public function destruir cliente
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente) {
            $cliente->delete();

            return response()
                ->route("ClientesN")
                ->with("success")
                ->json(["success" => true]);
        } else {
            return redirect()
                ->route("ClientesN")
                ->with("success", "No se pudo encontrar el cliente.");
        }
        return redirect()
            ->route("ClientesN")
            ->with("success", "Cliente eliminado exitosamente.");
    }

    public function edit($id)
    {
        // Encontrar el empleado a editar
        $cliente = Cliente::findOrFail($id);

        // Mostrar el formulario de edición con los proyectos asignados
        return route("clientes.edit", compact("cliente"));
    }
}
