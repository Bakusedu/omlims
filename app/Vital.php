<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    protected $fillable = [
        'patient_id', 'blood_pressure', 'height', 'weight', 'temperature'
    ];

    public function referredPatients()
    {
        return $this->belongsTo('App\Patient','patient_id','id');
    }
}
