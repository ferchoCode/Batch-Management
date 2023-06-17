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
        Schema::create('venta_credito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->integer('plazo_meses');
            $table->float('tasa_interes');
            $table->integer('cantidad_cuotas');
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
        Schema::dropIfExists('venta_credito');
    }
};
