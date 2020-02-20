<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'age', 'email', 'phone', 'gender', 'address'
    ];

    public function patientsVitals()
    {
        return $this->hasOne('App\Vital','patient_id');
    }

    public function patientsWithTestRef()
    {
        return $this->hasOne('App\Test','patient_id');
    }

    public function patientsResult()
    {
        return $this->hasOne('App\Result','patient_id','id');
    }

    public function patientSymptom()
    {
        return $this->hasOne('App\Symptom','patient_id','id');
    }
}
