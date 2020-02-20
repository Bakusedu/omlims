@extends('layouts.home.app')

@section('content')
    <div>
        <form action="/add_vitalsymptoms" method="POST">
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
                <h4><img src="{{ url('/img/vital.svg') }}" height="30px">{{ $patient->name }} vital signs</h4>
                <label for="height">Height</label>
                <input type="text" class="form-control" name="height" value="{{ old('height') }}">
                <input type="hidden" name="id"  value="{{ $patient->id }}">
                <input type="hidden" name="name"  value="{{ $patient->name }}">
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" name="weight" value="{{ old('weight') }}">
            </div>
            <div class="form-group">
                <label for="blood_pressure">Blood pressure</label>
                <input type="text" class="form-control" name="blood_pressure" value="{{ old('blood_pressure') }}">
            </div>
            <div class="form-group">
                <label for="name">Temperature</label>
                <input type="text" class="form-control" name="temperature" value="{{ old('temperature') }}">
            </div>
            <div style="position:relative">
                <input type="submit" class="btn btn-primary btn-block" value="Refer to Clinician">
            </div>
        </form>
    </div>
@stop