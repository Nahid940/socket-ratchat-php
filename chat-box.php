<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-3">

            <ul id="message-list">

            </ul>

            <form action="" id="chat-form">
                <input type="text" class="form-control" id="message" placeholder="Type Message">
                <button type="submit" class="btn btn-success mt-5">Send</button>
            </form>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var conn=new WebSocket('ws://localhost:8080');
        conn.onopen=function (e) {
            console.log("Connection Ok");
            conn.send("Message from browser !!")
        }

        var chatform=$('#chat-form')
        var messagelist=$('#message-list')

        chatform.on('submit',function (e) {
            e.preventDefault();
            var message=$('#message').val()
            conn.send(message);
            messagelist.prepend("<li>"+message+"</li>")
        })

        conn.onmessage=function (e) {
            console.log(e.data)
            messagelist.prepend("<li>"+e.data+"</li>")
        }


    })
</script>
</html>