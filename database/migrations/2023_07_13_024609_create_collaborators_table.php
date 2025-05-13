<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('username'); 
            $table->string('gmail');
            $table->string('contra')->nullable();
            $table->date('fecha_ingreso');
            $table->string('telefono');
            $table->string('company');
            $table->string('departamento');
            $table->string('designacion');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('collaborators');
    }
};