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
        Schema::create('tb_tipo_comidas', function (Blueprint $table) {
            $table->id('id_tipo_comida');
            $table->enum('nombre_categoria', [
                'Bebidas',
                'Postres',
                'Platillos Fuertes',
                'Entradas',
                'Sopas'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tipo_comidas');
    }
};
