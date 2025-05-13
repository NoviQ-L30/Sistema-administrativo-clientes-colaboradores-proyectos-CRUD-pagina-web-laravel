<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController2 extends Controller
{
    //Metodo para almacenar la imagen en el servidor
    public function store(Request $request)
    {   //Validar la imagen
        $imagen = $request->file('file');
        //Generar un nombre unico para la imagen
        $nombreImagen = Str::uuid().".".$imagen->extension();
        //Almacenar la imagen en el servidor
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000,);

        $imagenPath = public_path('uploads2'). '/'. $nombreImagen;
        $imagenServidor->save($imagenPath);

        //convertimos la imagen a json
        return response()->json(['imagen'=> $nombreImagen ]);
    }
}
