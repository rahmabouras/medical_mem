<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DossierPatient extends Model
{
    protected $table="dossier_patient";
    protected $primaryKey="id";

public function consultations()
    {
        return $this->HasMany('App\consultation','patient_id');
    }
    public function listAntecedent()
    {

        return $this->HasMany('App\Antecedent','patient_id');
    }
}



