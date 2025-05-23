<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('telefono');
            $table->string('nombre_empresa');
            $table->string('imagen');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};