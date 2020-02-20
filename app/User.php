<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Patient;
use App\Result;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nc_count()
    {
        $collections = Patient::where('status',0)->with('patientsVitals')->get();
        $refferedPatients = [];

        foreach($collections as $collection){
            if($collection->patientsVitals != null){
                $refferedPatients[] = $collection;
            }
        }

        $count = count($refferedPatients);

        return $count;
    }

    public function cl_count()
    {
        // function to count number of referred patients from clinician to lab
        $collections = Patient::where('status',1)->with('patientsWithTestRef')->get();
        $refferedPatients = [];
        foreach($collections as $collection){
            if($collection->patientsWithTestRef != null){
                if($collection->patientsWithTestRef->status == 0){
                    $refferedPatients[] = $collection;
                }
            }
        }
        if($refferedPatients){
            $count = count($refferedPatients);
        }
        else {
            $count = 0;
        }

        return $count;

    }

    public function lc_count()
    {
        // function to count number of referred patients back to clinician
        $collections = Result::where('status',0)->get();
        $count = count($collections);


        return $count;
    }
}
