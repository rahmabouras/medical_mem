<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $table = "diagnostic";
    protected $primaryKey = "id";

    public function listConsultation()
    {
        return $this->BelongsTo('App\consultation','consultation_id');

    }

}
