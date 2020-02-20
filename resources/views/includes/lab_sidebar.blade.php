    <aside>
        <p><img src="{{url('/img/patient.svg')}}" style="height:30px;margin-right:10px">
            <a href="/conduct_test">Patient from Clinician</a>
            <span id="notification" class="badge badge-danger">{{ Auth::user()->cl_count() }}</span>
        </p>
    </aside>
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