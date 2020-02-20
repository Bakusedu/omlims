<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <title>New staff</title>
</head>
<body>
    @include('layouts.navbar')
    <div style="border:1px solid light-grey;border-radius:5px;width:30%;margin-top:40px" class="container">
            <form action="/new_staff" method="POST">
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
                    <h4>New staff</h4>
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
        </div>
</body>
</html>