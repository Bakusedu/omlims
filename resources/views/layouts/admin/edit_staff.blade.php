@extends('layouts.home.app')

@section('content')
    <h4>Update staff</h4>
    <form action="/update_staff/{{ $staff->id }}" method="POST">
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="form-group">
            <label for="name">Full name</label>
            <input type="text" class="form-control" name="name" value="{{ $staff->name }}">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $staff->email }}">
        </div>
        <p>Privileges</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio1" name="privileges" value="nurse" <?php $checked =  ($staff->privileges == 'nurse') ? 'checked' : ''; echo $checked ?>>
            <label class="form-check-label" for="name">Nurse</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio2" name="privileges" value="clinician" <?php $checked = ($staff->privileges == 'clinician') ? 'checked' : ''; echo $checked ?>>
            <label class="form-check-label" for="name">Clinician</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio2" name="privileges" value="lab" <?php $checked = ($staff->privileges == 'lab') ? 'checked' : ''; echo $checked ?>>
            <label class="form-check-label" for="name">Lab Technician</label>
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Update">
    </form>

@stop