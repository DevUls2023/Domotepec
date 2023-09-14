<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolTable extends Migration
{
    public function up()
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rol');
    }
}