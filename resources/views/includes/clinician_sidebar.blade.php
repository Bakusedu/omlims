    <aside>
        <p><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="/diagnose_patient">Patient from Nurse</a>
            <span id="notification" class="badge badge-danger">{{Auth::user()->nc_count()}}</span>
        </p>
        <p><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="/final_result">Patient from Lab</a>
            <span id="notification2" class="badge badge-danger">{{Auth::user()->lc_count()}}</span>
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
        channel.bind('lab-clinician',function(data) {
            // alert(JSON.stringify(data));
            var value2 = document.getElementById('notification2').innerHTML;
            value2 = Number(value2) + 1;
            document.getElementById('notification2').innerHTML = value2;
        });
    </script>