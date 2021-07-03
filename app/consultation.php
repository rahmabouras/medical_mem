<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class consultation extends Model
{
    protected $table = "fiche_de_consultation";
    protected $primaryKey = "id";

    public function dossierPatient()
    {
        return $this->hasOne('App\DossierPatient', 'id', 'patient_id')
            ->select(array('id', 'nom_patient', 'prenom_patient', 'sexe','adress_patient','age_patient','cin','email','numtel_patient', 'situation_assurance' , 'description_generale'));
    }
    public function listRendezVous()
    {

        return $this->HasMany('App\Rendez_vous','consultation_id');
    }
    public function certificat()
    {

        return $this->HasMany('App\Certificat','consultation_id');
    }
    public function listDiagnostic()
    {

        return $this->HasMany('App\Diagnostic','consultation_id');
    }
    public function listAnalyse()
    {

        return $this->HasMany('App\OperationAnalyse','consultation_id');
    }
    public function listOrdonnance()    {

        return $this->HasMany('App\Ordonnance','consultation_id');
    }
}
