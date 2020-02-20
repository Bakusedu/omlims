<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'patient_id','fasting','blood','urine','swab','faeces','sputum','tissue','fluids','cytology'
    ];

    public function patients()
    {
        return $this->belongsTo('App\Patient','patient_id','id');
    }
}
