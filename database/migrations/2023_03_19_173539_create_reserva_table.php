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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('lote_id');
            $table->date('fecha_reserva');
            $table->date('fecha_expiracion');
            $table->float('monto');
            $table->enum('estado',['Activa','Anulada'])->default("Activa");
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('lote_id')->references('id')->on('lote');

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
        Schema::dropIfExists('reserva');
    }
};
