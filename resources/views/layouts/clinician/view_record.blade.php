@extends('layouts.home.app')

@section('content')
    <p class="alert alert-info">Please seperate patient symptoms using a Comma (<stong>,</strong>)</p>
    <div class="jumbotron" style="padding:15px">
        <h4 class="display-6">{{ $patient->name }}</h4>
        <p class="lead"><stong>Address:</strong> {{ $patient->address }}</p>
        <p><strong>Gender:</strong> {{ $patient->gender }}</p>
        <p><strong>Age:</strong> {{ $patient->age }}</p>
        <hr class="my-4">
        <p><strong>Height: </strong>{{ $patient->patientsVitals->height }} meters</p>
        <p><strong>Blood pressure: </strong>{{ $patient->patientsVitals->blood_pressure }}</p>
        <p><strong>Weight: </strong>{{ $patient->patientsVitals->weight }} Kg</p>
        <p><strong>Temperature: </strong>{{ $patient->patientsVitals->temperature }} &#8451;</p>
    </div>
    <form action="/symptoms/{{ $patient->id }}" method="POST">
    @method('PATCH')
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
        <div class="form-group">
            <input type="hidden" name="name" value="{{ $patient->name }}">
            <label for="">Patient symptoms</label>
            <textarea name="symptoms" id="" cols="30" class="form-control" rows="4"></textarea>
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Take symptoms">
    </form>
@stop