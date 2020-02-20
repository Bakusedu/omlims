<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Result;
use App\Events\referredPatientBackToClinician;


class LabController extends Controller
{
    public function conduct_test()
    {
        $patients = Test::where('status',0)->with('patients')->get();


        return view('layouts.lab.conduct_test')->with('patients',$patients);
    }
    public function viewRefTest($id)
    {
        $tests = Test::where('patient_id',$id)->with('patients')->first();


        return view('layouts.lab.view_ref')->with('tests',$tests);
    }
    public function submit_result($id)
    {
        Result::create(request()->all());

        $patient = Test::where('patient_id',$id)->first();
        $patient->status = true;
        $patient->save();

        $notification = [
            'patient_id' => $id
        ];

        event(new referredPatientBackToClinician($notification));

        return redirect('/view_ref/'.$id)->with(['success' =>'Patient result uploaded, referred back to Clinician']);
    }
}
