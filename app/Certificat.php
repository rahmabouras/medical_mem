<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    protected $table = "certificat";
    protected $primaryKey = "id";

    public function listConsultation()
    {
        return $this->BelongsTo('App\consultation','consultation_id');

    }

}
