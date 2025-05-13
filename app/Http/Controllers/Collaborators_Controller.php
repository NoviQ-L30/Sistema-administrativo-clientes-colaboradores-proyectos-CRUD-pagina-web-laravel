<?php

namespace App\Http\Controllers;

use App\Models\collaborator;
use Illuminate\Http\Request;
use App\Models\User;

class Collaborators_Controller extends Controller
{
    // Mostramos los colaboradores
    public function index()
    {
        $collaborators = collaborator::all();
        return view('auth.prueba2')->with([
            'collaborators' => $collaborators,
        ]);
    }
    // Método para guardar los colaboradores
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

        User::create([
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
            'usertype' => 'collaborator',
        ]);

        // Redireccionamos a la vista colaboradores
        return redirect()->route('CollaboratorsVista');
    }
}
