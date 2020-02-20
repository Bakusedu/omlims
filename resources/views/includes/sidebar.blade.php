@if(Auth::user()->privileges === 'admin')
    <aside>
        <p><img src="{{url('/img/eye.svg')}}" style="height:30px;margin-right:10px">
            <a href="/view_staff">View staff</a>
        </p>
        <p><img src="{{url('/img/plus.svg')}}" style="height:30px;margin-right:10px">
            <a href="/add_staff">Add staff</a>
        </p>
        <p class=""><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="">Patients</a>
        </p>
    </aside>
@elseif(Auth::user()->privileges === 'nurse')
    <aside>
        <p><img src="{{url('/img/plus.svg')}}" style="height:30px;margin-right:10px">
            <a href="/patient_add">Add new patient</a>
        </p>
        <!-- <p class=""><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="">Patients</a>
        </p> -->
    </aside>
@elseif(Auth::user()->privileges === 'clinician')
    <aside>
        <p><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="/diagnose_patient">Patient from Nurse</a>
            <span id="notification" class="badge badge-danger">{{Auth::user()->nc_count()}}</span>
        </p>
        <p><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="/patient_add">Patient from Lab</a>
        </p>
        <!-- <p class=""><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="">Patients</a>
        </p> -->
    </aside>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('6ec039b731a93595861e', {
            clusters: 'mt1',
            forceTLS: true
        });


        var channel = pusher.subscribe('my-channel');

        channel.bind('nurse-clinician',function(data) {
            // alert(JSON.stringify(data));
            var value = document.getElementById('notification').innerHTML;
            value = Number(value) + 1;
            document.getElementById('notification').innerHTML = value;
        });
    </script>
@elseif(Auth::user()->privileges === 'lab')
    <p><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
        <a href="/diagnose_patient">Patient from Clinician</a>
        <span id="notification" class="badge badge-danger"></span>
    </p>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('6ec039b731a93595861e', {
            clusters: 'mt1',
            forceTLS: true
        });


        var channel = pusher.subscribe('my-channel');

        channel.bind('clinician-lab',function(data) {
            // alert(JSON.stringify(data));
            var value = document.getElementById('notification').innerHTML;
            value = Number(value) + 1;
            console.log(value);
            document.getElementById('notification').innerHTML = value;
        });
    </script>
@endif