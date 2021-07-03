<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_patient', function (Blueprint $table) {
            $table->id();
                  $table->string('nom_patient');
            $table->string('prenom_patient');
            $table->string('adress_patient');
            $table->integer('age_patient');
            $table->integer('cin');
            $table->string('email');
            $table->string('sexe');
            $table->integer('numtel_patient');
            $table->string('situation_assurance');
            $table->string('description_generale');
            
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
        Schema::dropIfExists('dossier_patient');
    }
}
