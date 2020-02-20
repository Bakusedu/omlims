@extends('layouts.home.app')

@section('content')
    @if(count($patient) > 0)
        <div style="border:1px solid light-grey;border-radius:5px;" class="container">
            <h4>Patient record</h4>
            <ul class="list-group">
                @foreach($patient as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $user->name }}
                        <a href="/vital_signs/{{ $user->id }}" class="btn btn-primary">take vital signs</a>
                    </li>
                @endforeach
            </ul>       
        </div>
        @else
        <div class="alert alert-warning text-center">
            <p>Patient record not found,please register patient <a href="/patient_add">here</a></p>
        </div>
    @endif
@stop