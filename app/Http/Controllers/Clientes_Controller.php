<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use App\Models\proyect;
use App\Models\collaborator;
use App\Models\User;

class Clientes_Controller extends Controller
{
    // Mostramos los clientes
    public function index()
    {
        $clientesn = cliente::all()->count();
        $proyectsn = proyect::all()->count();
        $usersn = user::all()->count();
        $collaboratorsn = collaborator::get()->count();
        return view('tablas')->with([
            'clientesn' => $clientesn,
            'proyectsn' => $proyectsn,
            'collaboratorsn' => $collaboratorsn,
            'usersn' => $usersn,
        ]);
    }

    // Método para guardar los clientes
    public function store(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telefono' => 'required',
            'nombre_empresa' => 'required',
        ]);
        // Guardamos los datos en la BD
        cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'telefono' => $request->telefono,
            'nombre_empresa' => $request->nombre_empresa,
        ]);

        // Redireccionamos a la vista de clientes
        return redirect()->route('ClientesN');
    }
}
