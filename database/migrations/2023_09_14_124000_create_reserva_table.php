<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaTable extends Migration
{
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente');
            $table->unsignedBigInteger('cabaña');
            $table->date('ingreso');
            $table->date('egreso');
            $table->timestamps();

            $table->foreign('cliente')->references('id')->on('cliente');
            $table->foreign('cabaña')->references('id')->on('cabaña');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserva');
    }
}