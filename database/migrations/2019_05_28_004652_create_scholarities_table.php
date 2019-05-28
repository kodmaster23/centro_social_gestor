<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholaritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('turno');
            $table->integer('serie');
            $table->year('ano');
            $table->boolean('reprovou')->nullable();
            $table->text('observacao')->nullable();
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')->references('id')->on('applicants');
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
        Schema::dropIfExists('scholarities');
    }
}
