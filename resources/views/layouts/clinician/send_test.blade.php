@extends('layouts.home.app')

@section('content')
    <form action="/send_test/{{ $id }}" method="POST">
        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"></button>	
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col-md-12">
            <h4>Send {{ $name ?? 'Patient'}} for test, please fill the form accurately</h4>
            <div class="row">
                <div class="col-md-4">
                <input type="hidden" name="patient_id" value="{{ $id }}">
                <input type="hidden" name="requester" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="">How Urgent is this test?</label>
                        <input type="text" class="form-control" name="urgency">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Sample</label>
                        <input type="text" class="form-control" name="sample">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fasting">
                        <label class="form-check-label" for="exampleCheck1">Fasting</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="blood">
                        <label class="form-check-label">Blood</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="urine">
                        <label class="form-check-label">Urine</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="swab">
                        <label class="form-check-label" for="exampleCheck1">Swab</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="faeces">
                        <label class="form-check-label">Faeces</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="sputum">
                        <label class="form-check-label">Sputum</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="tissue">
                        <label class="form-check-label">Tissue</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fluids">
                        <label class="form-check-label">Fluids</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="cytology">
                        <label class="form-check-label">Cytology</label>
                    </div>
                </div>  
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="">Last dose</label>
                        <input type="text" class="form-control" name="last_dose">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="">Last dose date</label>
                        <input type="date" class="form-control" name="last_dose_date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="">Drug therapy</label>
                        <textarea name="drug_therapy" class="form-control" id="" cols="30" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-check-label">Others</label>
                        <textarea name="" id="" cols="30" rows="4" class="form-control" name="others"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-check-label">Clinical info</label>
                        <textarea name="" id="" cols="30" rows="4" class="form-control" name="clinical_info"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Refer patient to laboratory">
        </div>
    </form>
@stop