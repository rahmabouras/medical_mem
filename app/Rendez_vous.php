<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendez_vous extends Model
{
    protected $table="rendez_vous";
    protected $primaryKey="id";

    public function listConsultation()
    {
        return $this->BelongsTo('App\consultation','consultation_id');

    }
}
