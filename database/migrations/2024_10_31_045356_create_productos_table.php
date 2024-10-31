<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto'); // id_producto
            $table->unsignedBigInteger('id_tiporopa'); // id_tipo_ropa
            $table->decimal('precio', 10, 2); // precio
            $table->unsignedBigInteger('id_marca'); // id_marca
            $table->unsignedBigInteger('id_categoria'); // id_categoria
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_tiporopa')->references('id')->on('tipo_ropas')->onDelete('cascade');
            $table->foreign('id_marca')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

