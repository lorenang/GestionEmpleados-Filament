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
        Schema::create('Sucursales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('direccion', 20);
            $table->string('nombre', 20);
            $table->string('telefono', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Sucursales');
    }
};
