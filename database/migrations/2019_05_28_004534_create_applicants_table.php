<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->integer('cpf');
            $table->integer('rg');
            $table->timestamp('data_nascimento');
            $table->integer('telefone_primario');
            $table->integer('telefone_secundario')->nullable();
            $table->integer('genero');
            $table->string('turno')->nullable();
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id')->references('id')->on('families');
            $table->unsignedBigInteger('external_institution_id')->nullable();
            $table->foreign('external_institution_id')->references('id')->on('external_institutions');
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
        Schema::dropIfExists('applicants');
    }
}
