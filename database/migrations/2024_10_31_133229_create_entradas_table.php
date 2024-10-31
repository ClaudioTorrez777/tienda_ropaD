<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedBigInteger('id_proveedor');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_tiporopa');
            $table->decimal('precio_entrada', 10, 2);
            $table->date('fecha_entrada');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_tiporopa')->references('id')->on('tipo_ropas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradas');
    }
};
