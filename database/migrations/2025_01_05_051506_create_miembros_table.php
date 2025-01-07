<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellido',255);
            $table->string('direccion',255);
            $table->string('telefono',100);
            $table->string('fecha_nacimiento',100);
            $table->string('genero',50);
            $table->string('email',255)->unique();
            $table->string('estado',5);
            $table->string('departamento',255);
            $table->text('foto');
            $table->string('fecha_ingreso',55);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros');
    }
};
