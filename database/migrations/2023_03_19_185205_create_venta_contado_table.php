<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_contado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->string('descripcion');
            $table->integer('descuento');
            $table->foreign('venta_id')->references('id')->on('venta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_contado');
    }
};
