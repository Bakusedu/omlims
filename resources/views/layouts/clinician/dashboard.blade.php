<div>
    <h4>Welcome Clinician {{ auth()->user()->name }}</h4>
</div>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('6ec039b731a93595861e', {
        clusters: 'mt1',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');

    channel.bind('nurse-clinician',function(data) {
        alert(JSON.stringify(data));
    });
</script>