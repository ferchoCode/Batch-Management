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
        Schema::create('lote', function (Blueprint $table) {
            $table->id();

            $table->decimal("coord_A_lat", 10,8)->nullable();
            $table->decimal("coord_A_long", 10,8)->nullable();
            $table->decimal("coord_B_lat", 10,8)->nullable();
            $table->decimal("coord_B_long", 10,8)->nullable();
            $table->decimal("coord_C_lat", 10,8)->nullable();
            $table->decimal("coord_C_long", 10,8)->nullable();
            $table->decimal("coord_D_lat", 10,8)->nullable();
            $table->decimal("coord_D_long", 10,8)->nullable();
            $table->float("precio");
            $table->string("dimension");
            $table->enum('estado',['Disponible','Reservado','Vendido'])->default("Disponible");
            
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
        Schema::dropIfExists('lote');
    }
};
