<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionMesas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora_inicio');
            $table->string('hora_finalizacion');
            
            $table->integer('id_mesa')->unsigned();
            $table->foreign('id_mesa')->references('id')->on('mesas')->onDelete('cascade');
            
            $table->integer('id_camarero')->unsigned();
            $table->foreign('id_camarero')->references('id')->on('camareros')->onDelete('cascade');
            
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
        Schema::dropIfExists('asignacionMesas');
    }
}
