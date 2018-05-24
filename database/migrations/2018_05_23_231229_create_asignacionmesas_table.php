<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionmesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionmesas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora_inicio');
            $table->string('hora_finalizacion');
            
            $table->integer('id_mesa')->unsigned();
            
            $table->integer('id_camarero')->unsigned();
            
            $table->softDeletes();
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
        Schema::dropIfExists('asignacionmesas');
    }
}
