<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    protected $table = "antecedent";
    protected $primaryKey = "id";

    public function dossierPatient()
    {
        return $this->hasOne('App\DossierPatient', 'id', 'patient_id')
            ->select(array('id', 'nom_patient', 'prenom_patient', 'sexe','adress_patient','age_patient','cin','email','numtel_patient', 'situation_assurance'));
    }
}
