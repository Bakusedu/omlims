@extends('layouts.home.app')

@section('content')
    <div style="padding:15px">
        <div class="col-md-12">
            <h4>{{ $patients->name }} Test Result</h4>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Age:</strong> {{ $patients->age }} years</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Gender:</strong> {{ $patients->gender }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Fasting:</strong> {{ $patients->patientsResult->fasting }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Blood:</strong> {{ $patients->patientsResult->blood }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Urine:</strong> {{ $patients->patientsResult->urine }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Swab:</strong> {{ $patients->patientsResult->swab }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Faeces:</strong> {{ $patients->patientsResult->faeces }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Sputum:</strong> {{ $patients->patientsResult->sputum }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Tissue:</strong> {{ $patients->patientsResult->tissue }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Fluids:</strong> {{ $patients->patientsResult->fluids }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Cytology:</strong> {{ $patients->patientsResult->cytology }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Symptoms:</strong> {{ $patients->patientSymptom->symptoms }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Blood pressure:</strong> {{ $patients->patientsVitals->blood_pressure }} mm/hg</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Weight:</strong> {{ $patients->patientsVitals->weight }} kg</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Temperature:</strong> {{ $patients->patientsVitals->temperature }} &#8451;</p>
                </div>
            </div>
            <form action="/administer/{{ $patients->id }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"></button>	
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="form-group">
                    <label for="">Administer Drugs</label>
                    <textarea name="drug" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Administer">
            </form>
        </div>
    </div>
@stop