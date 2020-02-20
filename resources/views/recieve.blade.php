<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciever pusher</title>
    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
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
</head>
<body>
    <h4>My first Pusher test, i just hope it works as planned!</h4>
</body>
</html>