@extends('layouts.home.app')

@section('content')
    <h4>Patient history</h4>
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Patient name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Symptom</th>
                <th scope="col">Drugs</th>
                </tr>
            </thead>
            <tbody>
                @if($history->patientSymptom != null)
                    <tr>
                    <td>{{ $history['name'] }}</td>
                    <td>{{ $history['email'] }}</td>
                    <td>{{ $history['address'] }}</td>
                    <td>{{ $history->patientSymptom->symptoms }}</td>
                    <td>
                        @if($history->patientSymptom->drugs === null)
                            <span class="badge badge-warning">No drug administered yet</span>
                        @else
                            {{ $history->patientSymptom->drugs }}
                        @endif
                    </td>
                    </tr>
                @else
                    <p class="alert alert-warning">Patient has not been attended to</p>
                @endif
            </tbody>
        </table>
    </div>
@stop