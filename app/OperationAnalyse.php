<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationAnalyse extends Model
{
protected $table ="operationanalyse";
    protected $primaryKey = "id";


    public function listConsultation()
    {
        return $this->BelongsTo('App\consultation','consultation_id');

    }
}
