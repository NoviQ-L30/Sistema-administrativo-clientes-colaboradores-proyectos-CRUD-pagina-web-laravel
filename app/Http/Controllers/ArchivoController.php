<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    // Método para almacenar el archivo PDF en el servidor
    public function store(Request $request)
    {
        // Validar el archivo PDF
        $pdf = $request->file("file");

        // Generar un nombre único para el PDF
        $nombrePDF = Str::uuid() . "." . $pdf->extension();

        // Almacenar el PDF en el servidor
        $pdfPath = public_path("uploads") . "/" . $nombrePDF;
        $pdf->move(public_path("uploads"), $nombrePDF);

        // Devolver el nombre del PDF almacenado
        return response()->json(["pdf" => $nombrePDF]);
    }
}
