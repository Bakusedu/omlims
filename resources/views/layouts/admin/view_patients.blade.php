@extends('layouts.home.app')

@section('content')
    <h4>Our Staffs</h4>
    <div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Patient name</th>
                <th scope="col">Email</th>
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
                    <td>{{ $patient['email'] }}</td>
                    <td>{{ $patient['address'] }}</td>
                    <td>
                        <a class="btn btn-primary" href="/view_history/{{ $patient->id }}">View</a>
                        <a class="btn btn-danger" href="/remove_patient/{{ $patient->id }}">Remove</a>
                    </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
@stop