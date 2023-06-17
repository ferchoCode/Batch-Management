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
        Schema::create('cuota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_credito_id');
            $table->integer('numero_cuota');
            $table->float('monto');
            $table->date('fecha_vencimiento');
            $table->date('fecha_pago');
            $table->enum('estado',['PENDIENTE','PAGADA','VENCIDA']);
            $table->foreign('venta_credito_id')->references('id')->on('venta_credito');
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
        Schema::dropIfExists('cuota');
    }
};
