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
        Schema::create('Empleados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->string('email', 100);
            $table->string('telefono', 20);
            $table->date('fecha_de_nacimiento');
            $table->date('fecha_de_ingreso');
            $table->foreignId('sucursal_id')->constrained('Sucursales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Empleados');
    }
};
