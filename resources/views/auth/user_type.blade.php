<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Who Are You</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('css/who.css') }}">
</head>

<body>
    <div class="view-page d-flex flex-column justify-content-center">
        {{-- <header>
            <div class="login">
                <img src="/images/pic-login.jpg">
                <div class="login1">
                    <img src="/images/Welcome.png">
                </div>
            </div>
        </header> --}}

        <div class="container">
            <section class="content">
                <div class="text-center mb-5">
                    <img class="logo" src="/images/logo-final 2.png">
                </div>
                <h1 class="text-center fw-light">Welcome to <span class="fw-bold text-primary">YOUNG & CHIC</span>!</h1>
                <p class="text-center mb-5">Choose your role to explore the website</p>

                <form id="form" action="/auth/usertype" method="POST">
                    <div class="row gy-4">
                        @csrf
                        <input type="hidden" name="type" id="type">
                        <div class="col-12 col-md d-flex flex-column">
                            <button type="button" class="btn btn-outline-primary rounded-pill py-3"
                                data-value="participant">Participant</button>
                        </div>
                        <div class="col-12 col-md d-flex flex-column">
                            <button type="button" class="btn btn-outline-primary rounded-pill py-3" data-value="designer">Young
                                Designer</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>

{{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("button").click(function(e) {
            e.preventDefault();
            $('#type').val($(this).data('value'));
            $('#form').submit();
        });
    });
</script>

</html>
