<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedent', function (Blueprint $table) {
            $table->id();
            $table->string('type_antecedent');
            $table->string('description_antecedent');
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
        Schema::dropIfExists('antecedent');
    }
}
