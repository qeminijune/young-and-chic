<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Who Are You</title>

    <link rel="stylesheet" type="text/css" href="{{asset("css/who.css")}}">
</head>
<body>
    <div id="wrapper">
        <header>
            <div class="login">
                <img src="/images/pic-login.jpg">
                <div class="login1">
                    <img src="/images/Welcome.png">
                </div>
            </div>
        </header>

        <section>
            <div id="logo">
                <a href="index.html">
                    <img src="/images/logo-final 2.png">
                </a>
            </div>

            <form action="/auth/usertype" method="POST">
                @csrf
                <input name="type" type="hidden" value="participant">
                <button type="submit" class="btn btn-primary">Participant</button>
            </form>
            <form action="/auth/usertype" method="POST">
                @csrf
                <input name="type" type="hidden" value="designer">
                <button type="submit" class="btn btn-primary">Young Designer</button>
            </form>
        </section>
    </div>
</body>
</html>
