<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $table ="ordonnance";
    protected $primaryKey = "id";

    public function listConsultation()
    {
        return $this->BelongsTo('App\consultation','consultation_id');

    }
}
