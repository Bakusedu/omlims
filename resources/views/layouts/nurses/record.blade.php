@extends('layouts.home.app')

@section('content')
    <div>
            <form action="/add_patient" method="POST">
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
                    <h4><img src="{{ url('/img/record.png') }}" height="30px">New Patient Record</h4>
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="name">Age</label>
                    <input type="number" class="form-control" name="age" value="{{ old('age') }}">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('email') }}">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio1" name="gender" value="male" {{ (old('gender') == 'male') ? 'checked' : ''}}>
                    <label class="form-check-label" for="name">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio2" name="gender" value="female" {{ (old('gender') == 'female') ? 'checked' : ''}}>
                    <label class="form-check-label" for="name">Female</label>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" value="{{ old('address') }}" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Add record">
            </form>
    </div>
@stop