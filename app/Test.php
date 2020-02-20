<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'patient_id','urgency','sample','fasting','blood','urine','swab',
        'faeces','sputum','tissue','fluids','cytology','others','drug_therapy','last_dose',
        'last_dose_date','clinical_info','requester'
    ];

    protected $table = 'test'; 

    public function patients()
    {
        return $this->belongsTo('App\Patient','patient_id','id');
    }
}
