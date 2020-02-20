@extends('layouts.home.app')

@section('content')
    <h4>Patients in queue</h4>
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Patient name</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
                @foreach($patients as $patient)
                    <tr>
                    <td scope="row">{{ $i }}</td>
                    <td>{{ $patient['name'] }}</td>
                    <td>{{ $patient['gender'] }}</td>
                    <td>{{ $patient['address'] }}</td>
                    <td>
                        @if($patient->patientsVitals === null)
                            <a class="badge badge-warning" href="#">no vital symptoms</a>
                        @else
                            <a class="btn btn-primary" href="/view_record/{{ $patient['id'] }}">Diagnose</a>
                        @endif
                    </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
@stop