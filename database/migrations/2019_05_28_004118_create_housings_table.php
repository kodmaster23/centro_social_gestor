<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo_domicilio');
            $table->integer('tipo_propriedade');
            $table->integer('tipo_edificacao');
            $table->integer('nro_comodos');
            $table->integer('nro_dormitorios');
            $table->integer('agua_encanada');
            $table->integer('luz_eletrica');
            $table->integer('gas_encanado');
            $table->integer('rede_esgoto');
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id')->references('id')->on('families');
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
        Schema::dropIfExists('housings');
    }
}
