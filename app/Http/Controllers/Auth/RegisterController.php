<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\User;
use App\Patient;
use App\Vital;
use App\Events\referredPatientToClinician;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    // add patient record
    public function add_patient(Request $request)
    {
        $credentials =  $request->validate([
            'name' => 'required|max:25',
            'age' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required'
        ]);

        $patient = Patient::create($credentials);

        return redirect('/vital_signs/'.$patient->id);
    }

    public function takeVitalSigns(Request $request)
    {
        $credentials =  $request->validate([
            'blood_pressure' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'temperature' => 'required'
        ]);

        Vital::updateOrCreate([
            'patient_id'   => $request->id,
        ],[
            'patient_id' => $request->id,
            'blood_pressure' => $request->blood_pressure,
            'height' => $request->height,
            'weight' => $request->weight,
            'temperature' => $request->temperature,
        ]);

        $notification = [
            'message' => $request->name.' has been referred to you',
            'patient_id' => $request->id
        ];

        event(new referredPatientToClinician($notification));



        return redirect()->back()->with(['success' => $request->name.' has been referred to the Clinician']);

    }

    public function viewVitalSigns($id)
    {
        $patient = Patient::where('id',$id)->first();

        return view('layouts.nurses.vitalsigns')->with(['patient' => $patient]);
    }
}
