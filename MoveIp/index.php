<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <script type="text/javascript" src="web/js/jquery.min.js"></script>
    <script>
        $(function () {

            function wsStart() {


                var conn = new WebSocket('ws://127.0.0.1:8123');
                conn.onmessage = function (e) {
                    console.log(e.data);
                    $("#chat").append("<p>" + e.data + "</p>");
                };
                conn.onopen = function (e) {
                    $("#chat").append("<p>system: connection is open</p>");
                    conn.send('Hello Me!');
                };
                conn.onclose = function (e) {
                    $("#chat").append("<p>system: connection is close</p>");
                    conn.send('Close Me!');
                };
                console.log(conn);

            }

            wsStart();

            $('#chat').height($(window).height() - 80);

            $('#input').focus();
        });

    </script>
</head>
<body>
<div id="chat" style="overflow: auto;"><p>system: please wait, I try to connect to the server.</p></div>
</body>
</html>