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
                <th scope="col">Staff name</th>
                <th scope="col">Email</th>
                <th scope="col">Designation</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
                @foreach($staffs as $staff)
                    <tr>
                    <td scope="row">{{ $i }}</td>
                    <td>{{ $staff['name'] }}</td>
                    <td>{{ $staff['email'] }}</td>
                    <td>
                        @if($staff['privileges'] === 'nurse')
                            <span>Nurse</span>
                        @elseif($staff['privileges'] === 'clinician')
                            <span>Clinician</span>
                        @elseif($staff['privileges'] === 'lab')
                            <span>Lab technician</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/edit_staff/{{ $staff['id'] }}">Edit</a>
                        <a class="btn btn-danger" href="/delete_staff/{{ $staff['id'] }}">Remove</a>
                    </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
@stop