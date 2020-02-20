<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        @include('layouts.navbar')

        <div class="container">
            <div style="display:flex;margin-top:20px">
                <div style="width:30%">
                @if(Auth::user()->privileges === 'lab')
                    @include('includes.lab_sidebar')
                @endif
                @if(Auth::user()->privileges === 'admin')
                    @include('includes.admin_sidebar')
                @endif
                @if(Auth::user()->privileges === 'clinician')
                    @include('includes.clinician_sidebar')
                @endif
                @if(Auth::user()->privileges === 'nurse')
                    @include('includes.nurse_sidebar')
                @endif
                </div>
                <div style="width:70%">
                    @yield('content')  
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>