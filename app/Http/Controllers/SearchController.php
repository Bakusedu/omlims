<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class SearchController extends Controller
{
    public function getPatientRecord(Request $request)
    {
        $patient = Patient::where('name','LIKE','%'.$request->search.'%')->Orwhere('email','LIKE','%'.$request->search.'%')->Orwhere('phone','LIKE','%'.$request->search.'%')->get();

        return view('layouts.nurses.search')->with(['patient' => $patient ]);
    }
}
