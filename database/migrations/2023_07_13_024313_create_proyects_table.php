<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('proyects', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proyecto');
            //PONER FECHA DE INICIO
            $table->date('fecha_inicio');
            //PONER FECHA DE FINALIZACION
            $table->date('fecha_finalizacion');
            //NIVEL DE PRIORIDAD
            $table->string('prioridad');
            //AÑADIR LIDER DE PROYECTO
            //AÑADIR COLABORADORES
            $table->unsignedBigInteger('id_colaborador')->constrained();
            $table->unsignedBigInteger('id_colaborador2')->constrained();
            $table->unsignedBigInteger('id_cliente')->constrained();
            //DESCRIPCION DEL PROYECTO
            $table->string('descripcion');
            //SUBIR ARCHIVOS CON DROPZONE
            $table->string('archivo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyects');
    }
};