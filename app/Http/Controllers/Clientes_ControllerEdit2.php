<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class Clientes_ControllerEdit2 extends Controller
{
    //ESTE CONTROLADOR ES PARA LA FUNCION DE BORRAR
    public function index()
    {
        $clientes = cliente::all();
        return view("ClientesEdit2")->with([
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
        // Encontrar el cliente a editar
        $cliente = Cliente::findOrFail($id);
    
        // Mostrar la vista de edición con el formulario y los datos del cliente
        return view('ClientesEdit2', compact('cliente'));
    }

    public function update(Request $request, $id)
{
    $cliente = Cliente::findOrFail($id);
    $request->validate([
        "nombre" => "required",
        "apellido" => "required",
        "username" => "required",
        "email" => "required",
        "telefono" => "required",
        "nombre_empresa" => "required",
    ]);

    // Actualizar los campos del cliente
    $cliente->nombre = $request->nombre;
    $cliente->apellido = $request->apellido;
    $cliente->username = $request->username;
    $cliente->email = $request->email;
    $cliente->telefono = $request->telefono;
    $cliente->nombre_empresa = $request->nombre_empresa;


    // Guardar los cambios en la base de datos
    $cliente->save();

    return redirect()
        ->route("ClientesN")
        ->with("success", "Cliente actualizado exitosamente.");
}



    
}
