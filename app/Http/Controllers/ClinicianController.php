<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Patient;
use App\Symptom;
use App\Events\referredPatientToLab;
use App\Test;
use App\Result;

class ClinicianController extends Controller
{
    public function diagnose_patient()
    {
        $patients = Patient::where('status',0)->with('patientsVitals')->get();

        return view('layouts.clinician.diagnose_patient')->with('patients',$patients);
    }
    public function view_record($id)
    {
        $patient = Patient::where('id',$id)->with('patientsVitals')->first();

        return view('layouts.clinician.view_record')->with('patient',$patient);
    }
    public function symptoms($id, Request $request)
    {
        $request->validate([
            'symptoms' => 'required'
        ]);

        $symptom = new Symptom();
        $symptom->patient_id = $id;
        $symptom->symptoms = $request->symptoms;

        $symptom->save();

        $name = $request->name;

        return redirect('/send_test/'.$id)->with(['id' => $id,'name' => $name]);
    }

    public function send_test($id)
    {
        $name = Patient::where('id',$id)->first()->name;
        return view('layouts.clinician.send_test')->with(['id' => $id,'name' => $name]);
    }

    public function refer_lab(Request $request)
    {
        $credentials = $request->validate([
            'urgency' => 'required',
            'sample' => 'required'
        ]);
        $test = new Test();
        $test->patient_id = $request->patient_id;
        $test->urgency = $request->urgency;
        $test->sample = $request->sample;
        $test->fasting = ($request->fasting === 'on')? true : false;
        $test->blood = ($request->blood === 'on')? true : false;
        $test->urine = ($request->urine === 'on')? true : false;
        $test->swab = ($request->swab === 'on')? true : false;
        $test->faeces = ($request->faeces === 'on')? true : false;
        $test->sputum = ($request->sputum === 'on')? true : false;
        $test->tissue = ($request->tissue === 'on')? true : false;
        $test->fluids = ($request->fluids === 'on')? true : false;
        $test->cytology = ($request->cytology === 'on')? true : false;
        $test->others = $request->others;
        $test->drug_therapy = $request->drug_therapy;
        $test->last_dose = $request->last_dose;
        $test->last_dose_date = $request->last_dose_date;
        $test->clinical_info = $request->clinical_info;
        $test->requester = $request->requester;
        
        $test->save();

        $notification = [
            'patient_id' => $request->patient_id
        ];

        $patient = Patient::where('id',$request->patient_id)->first();
        $patient->status = true;
        $patient->save();

        event(new referredPatientToLab($notification));

        return back()->with(['success' =>'Patient has been referred to the Lab','id' => $request->patient_id]);
    }

    public function final_result()
    {
        $patients = Result::where('status',0)->with('patients')->get();

        return view('layouts.clinician.final_result')->with('patients',$patients);
    }

    public function view_result($id)
    {
        $patients = Patient::where('id',$id)->with('patientsResult')->with('patientSymptom')->with('patientsVitals')->first();

        $result = Result::where('patient_id',$id)->first();
        $result->status = true;
        $result->save();

        return view('layouts.clinician.view_result')->with('patients',$patients);
    }

    public function administer($id,Request $request)
    {
        $request->validate([
            'drug' => 'required'
        ]);
        $drug = Symptom::where('patient_id',$id)->first();

        $drug->drugs = $request->drug;

        $drug->save();

        return redirect('/view_result/'.$id)->with('success','Drug Administered to Patient Successfully');
    }
}
