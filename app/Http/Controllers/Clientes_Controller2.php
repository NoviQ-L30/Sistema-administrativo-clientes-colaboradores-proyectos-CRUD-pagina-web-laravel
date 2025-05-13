<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class Clientes_Controller2 extends Controller
{
    public function index()
    {
        $clientes = cliente::all();
        return view("prueba5")->with([
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

}
