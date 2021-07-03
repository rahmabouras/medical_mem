<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheDeConsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_de_consultation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_de_creation');
            $table->string('description_cas');
             $table->unsignedBigInteger('patient_id');

          
            $table->foreign('patient_id')->references('id')->on('dossier_patient');
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
        Schema::dropIfExists('fiche_de_consultation');
    }
}
