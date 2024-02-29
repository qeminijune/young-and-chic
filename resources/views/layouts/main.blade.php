<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Young & Chic</title>
    <link rel="icon" type="image/x-icon" href="/images/logo-final 2.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/gentium-basic" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/job.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/all-event.css') }}"> --}}
    @yield('head')
    <!-- custom js file link  -->
    <script src="{{ asset('js/script.js') }}" defer></script>

    <script>
        /* When the user clicks on the button,toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>

    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: black;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 100px;
        }

        #myBtn:hover {
            background-color: #960021;
            transition: 0.3s;
        }

        .dropdown-menu {
            /* width: 300px; */
            height: auto;
            border-radius: 10px;

        }

        .dropdown-item {
            font-family: 'Gentium Basic', sans-serif;
            font-size: 13px;
            text-transform: none;
        }

        .btn {
            margin-top: 10px;
            border: none
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <header>
            <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
            <div id="head">
                <div class="menu">
                    <div id="logo">
                        <a href="/">
                            <img src="/images/logo-final 2.png">
                        </a>
                    </div>
                    <div class="box-menu">
                        <div id="menu-list">
                            {{-- <li>
                                <a href="/foryou.html">For You</a>
                            </li> --}}
                            <li><a href="{{ route('jobshow') }}">Fine a Team</a></li>
                            {{-- <li><a href="{{ route('discover') }}">Discover</a></li> --}}
                            <li><a href="{{ route('profile') }}">Profile</a></li>
                        </div>
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @if (Auth::check())
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle show" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-bell"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @forelse (Auth::user()->unreadNotifications as $noti)
                                                @if (!empty($noti['data']['type']) && $noti['data']['type'] == 'approve')
                                                    <li><a class="dropdown-item" href="#"><img
                                                                src="/images/{{ $noti['data']['job']['image'] }}"
                                                                width="60"> Get you on the Team |
                                                            {{ $noti->created_at }} </a>
                                                    </li>
                                                @else
                                                    <li><a class="dropdown-item"
                                                            href="#">{{ $noti['data']['user']['name'] . ' Apply for a Team on your post ' . $noti['data']['job']['image'] . ' | ' . $noti->created_at }}</a>
                                                    </li>
                                                @endif
                                                <hr>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </span>
                                @endif

                                @auth
                                    {{-- <a href="{{ url('/dashboard') }}"
                                        class="logout font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                        Out</a> --}}
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn"><i
                                                class="fa-solid fa-user"></i></button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="{{ route('upload', Auth::user()->id) }}">Profile account</a>
                                            <a href="{{ route('mn.profile') }}">Manage profile</a>
                                            {{-- <a href="{{ route('bookmarks') }}">Bookmarks</a> --}}
                                            {{-- <a href="{{ route('savejobs') }}">Save a Jobs</a> --}}
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log
                                                    out</a>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="login font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                                        In</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="register ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                                            Up</a>
                                    @endif
                                @endauth
                                {{-- <i class="fas fa-user"></i> --}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <section>
            @yield('content')
        </section>
        <footer>
            <div id="footer">
                <div class="help">
                    <div class="help-ft">
                        <p>HELP</p>
                        <h1>Team & Condition</h1>
                    </div>
                    <div class="abt-us">
                        <a href="index.html">
                            <img src="/images/logo-white 1.png">
                        </a>
                        <h2>About Us</h2>
                        <h3>Privacy Policy</h3>
                    </div>
                    <div class="newsletter">
                        <h4>Newsletter</h4>
                        <div id="signup">
                            <label for="fname">Sign Up to receive news update</label><br>
                        </div>
                        <input type="text" id="username" name="username" value=""
                            placeholder="Enter email address"><br>
                    </div>
                    <div class="search-footer">
                        <input id="search" type="text" name="search" placeholder="Search... "><i
                            class="fas fa-search"></i>
                    </div>
                    <h5>COPYRIGHT © ALL RIGHTS RESERVED LOGO</h5>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

@yield('script')

</html>
