@extends('layouts.home.app')

@section('content')
    <h4>Add Staff</h4>
    <form action="/add_staff" method="POST">
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
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="form-group">
            <label for="name">Full name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <p>Privileges</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio1" name="privileges" value="nurse" {{ (old('privileges') == 'nurse') ? 'checked' : ''}}>
            <label class="form-check-label" for="name">Nurse</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio2" name="privileges" value="clinician" {{ (old('privileges') == 'clinician') ? 'checked' : ''}}>
            <label class="form-check-label" for="name">Clinician</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio2" name="privileges" value="lab" {{ (old('privileges') == 'lab') ? 'checked' : ''}}>
            <label class="form-check-label" for="name">Lab Technician</label>
        </div>
        <input type="submit" class="btn btn-success btn-block" value="Register">
    </form>
@stop