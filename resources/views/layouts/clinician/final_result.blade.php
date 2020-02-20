@extends('layouts.home.app')

@section('content')
    <h4>Final Patient Result</h4>
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
                    <td>{{ $patient->patients->name }}</td>
                    <td>{{ $patient->patients->gender }}</td>
                    <td>{{ $patient->patients->address }}</td>
                    <td>
                        <a class="btn btn-primary" href="/view_result/{{ $patient->patients->id }}">View Result</a>
                    </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
@stop