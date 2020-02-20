@extends('layouts.home.app')

@section('content')
    <form action="/submit_result/{{ $tests->patients->id }}" method="post">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @csrf
        <input type="hidden" name="patient_id" value="{{ $tests->patients->id }}">
        <div style="padding:15px">
            <h4 class="display-6"></h4>
            <p class="lead"><stong>Patient name:</strong> {{ $tests->patients->name }}</p>
            <p><strong>Test Urgency:</strong> {{ $tests->urgency }}</p>
            <p><strong>Sample: </strong>{{ $tests->sample }}</p>
            <div style="display:flex; justify-content:space-between">
                <p style="width:50%"><strong>Fasting Blood Sugar:</strong>
                    @if($tests->fasting)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="fasting" placeholder="Fasting Blood Sugar Result">
                </div>
            </div>
            <div style="display:flex">
                <p style="width:50%"><strong>Blood test:</strong>
                    @if($tests->blood)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="blood" placeholder="Blood test Result">
                </div>
            </div>
            <div style="display:flex">
                <p style="width:50%"><strong>Swab test:</strong>
                    @if($tests->swab)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="swab" placeholder="Swab Test Result">
                </div>
            </div>
            <div style="display:flex">
                <p style="width:50%"><strong>Urine test:</strong>
                    @if($tests->urine)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="urine" placeholder="Urine Test Result">
                </div>
            </div>
            <div style="display:flex">
                <p style="width:50%"><strong>Faeces test:</strong>
                    @if($tests->faeces)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="faeces" placeholder="Faeces Test Result">
                </div>
            </div>
            <div style="display:flex">
                <p style="width:50%"><strong>Sputum test:</strong>
                    @if($tests->sputum)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="sputum" placeholder="Sputum Test Result">
                </div>
            </div>
            <div style="display:flex">
                <p style="width:50%"><strong>Tissue test:</strong>
                    @if($tests->tissue)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="tissue" placeholder="Tissue Result Test">
                </div>
            </div>
            <div style="display:flex">
                <p style="width:50%"><strong>Fluid test:</strong>
                    @if($tests->tissue)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="fluid" placeholder="Fluid Result Test">
                </div>
            </div>
            <p><strong>Last dose:</strong>
                @if($tests->last_dose)
                    {{ $test->last_dose }}
                @else
                    Nil
                @endif
            </p>
            <p><strong>Last dose date:</strong>
                @if($tests->last_dose_date)
                    {{ $tests->last_dose_date }}
                @else
                    Nil
                @endif
            </p>
            <div style="display:flex">
                <p style="width:50%"><strong>Cytology:</strong>
                    @if($tests->tissue)
                        Yes
                    @else
                        No
                    @endif
                </p>
                <div style="width:50%" class="form-group">
                    <input type="text" class="form-control" name="cytology" placeholder="Cytology Test Result">
                </div>
            </div>
            <p><strong>Others:</strong>
                @if($tests->others)
                    {{ $tests->others }}
                @else
                    Nil
                @endif
            </p>
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Submit Result">
    </form>
@stop