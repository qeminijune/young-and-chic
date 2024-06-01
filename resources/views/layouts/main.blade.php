<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Young & Chic</title>
    <link rel="icon" type="image/x-icon" href="/images/logo-final 2.png">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <link href="https://fonts.cdnfonts.com/css/gentium-basic" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/all-event.css') }}"> --}}
    <!-- custom js file link  -->
    {{-- <script src="{{ asset('js/script.js') }}" defer></script> --}}
    
    <script>
        /* When the user clicks on the button,toggle between hiding and showing the dropdown content */
        // function myFunction() {
            //     document.getElementById("myDropdown").classList.toggle("show");
            // }
            
            // function filterFunction() {
                //     var input, filter, ul, li, a, i;
                //     input = document.getElementById("myInput");
                //     filter = input.value.toUpperCase();
                //     div = document.getElementById("myDropdown");
                //     a = div.getElementsByTagName("a");
                //     for (i = 0; i < a.length; i++) {
                    //         txtValue = a[i].textContent || a[i].innerText;
                    //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        //             a[i].style.display = "";
                        //         } else {
                            //             a[i].style.display = "none";
                            //         }
                            //     }
                            // }
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
            /* padding: 15px; */
            border-radius: 100px;
            width: 50px;
            height: 50px;
        }

        #myBtn:hover {
            background-color: #960021;
            transition: 0.3s;
        }

        /* .dropdown-menu {
            width: 300px;
            height: auto;
            border-radius: 10px;
        } */

        /* .dropdown-item {
            font-family: LINESEED;
            font-size: 13px;
            text-transform: none;
        } */

        /* .btn {
            margin-top: 10px;
            border: none
        } */
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    @yield('head')

</head>

<body>
    {{-- <header>
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i
                    class="fa-solid fa-angle-up"></i></button>
            <div id="head">
                <div class="menu">
                    <div id="logo">
                        <a href="/">
                            <img src="/images/logo-final 2.png">
                        </a>
                    </div>
                    <div class="box-menu">
                        <div id="menu-list">
                            <li><a href="{{ route('jobshow') }}">Fine a Team</a></li>
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
                                                                width="60" height="60"
                                                                style="border-radius: 5px; object-fit: cover"> Get you
                                                            on the Team |
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
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn"><i
                                                class="fa-solid fa-user"></i></button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="{{ route('upload', Auth::user()->id) }}">Profile account</a>
                                            <a href="{{ route('mn.profile') }}">Manage profile</a>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">Log
                                                    out</a>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="box-login">
                                        <div class="box-signin">
                                            <a href="{{ route('login') }}"
                                                class="login font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                                                In</a>
                                        </div>
                                        @if (Route::has('register'))
                                            <div class="box-signup">
                                                <a href="{{ route('register') }}"
                                                    class="register p-3 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                                    style="background-color: #000">Sign
                                                    Up</a>
                                            </div>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header> --}}
    <header>
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-angle-up"></i></button>
        <nav class="navbar navbar-expand-md bg-body border-bottom border-light-subtle">
            <div class="container">
                <div class="row flex-grow-1 justify-content-between align-items-center gy-4">
                    <div class="col-auto d-md-none">
                        <button class="btn" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars fs-1"></i>
                        </button>
                    </div>
                    <div class="col col-md-12 text-md-center">
                        <a class="navbar-brand" href="/">
                            <img class="logo" src="/images/logo-final 2.png">
                        </a>
                    </div>
                    <div class="col-auto d-md-none">
                        {{-- notification --}}
                        @if (Auth::check())
                            <span class="dropdown">
                                <a class="" type="button" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-bell position-relative fs-3">
                                        @if (Auth::user()->unreadNotifications->count() > 0)
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ Auth::user()->unreadNotifications->count() }}
                                                <span class="visually-hidden">New alerts</span>
                                            </span>
                                        @endif
                                    </i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end list-notification overflow-y-scroll" style="max-height:500px">
                                    <li>
                                        <h6 class="dropdown-header">Notifiations</h6>
                                    </li>
                                    @forelse (Auth::user()->notifications as $noti)
                                        @if (!empty($noti['data']['type']) && $noti['data']['type'] == 'approve')
                                            <li>
                                                <a class="dropdown-item white-space-normal {{ $noti->read_at ? '' : 'active' }} p-3"
                                                    href={{ route('jointeam', $noti['data']['job']['id']) }}>
                                                    <div class="row gx-3">
                                                        <div class="col-auto">
                                                            <img src="/images/{{ $noti['data']['job']['image'] }}"
                                                                width="60" height="60"
                                                                style="border-radius: 5px; object-fit: cover">
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="mb-2 fs-md-14px">
                                                                        {{ $noti['data']['user']['name'] }} Get you
                                                                        on the Team</p>
                                                                </div>
                                                                <div class="col-12 col-md-auto">
                                                                    <span class="mb-2 fs-md-12px">
                                                                        {{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a class="dropdown-item white-space-normal {{ $noti->read_at ? '' : 'active' }} p-3"
                                                    href={{ route('jointeam', $noti['data']['job']['id']) }}>
                                                    <div class="row gx-3">
                                                        <div class="col-auto">
                                                            <img src="{{ $noti['data']['job']['image'] }}"
                                                                width="60" height="60"
                                                                style="border-radius: 5px; object-fit: cover">
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="mb-2 fs-md-14px">
                                                                        {{ $noti['data']['user']['name'] }} Apply
                                                                        for a Team on your post</p>
                                                                </div>
                                                                <div class="col-12 col-md-auto">
                                                                    <span class="mb-2 fs-md-12px">
                                                                        {{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                        <li>
                                            <p class="p-3">No notification</p>
                                        </li>
                                    @endforelse
                                </ul>
                            </span>
                        @endif
                    </div>
                    {{-- sign in and sign up --}}

                    @auth()
                        <div class="col-auto d-md-none">
                            <div class="dropdown">
                                <a class="" type="button" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img class="avatar-nav"
                                        src="{{ Auth::user()->image ? Auth::user()->image : (Auth::user()->profile_photo_path ? Auth::user()->profile_photo_path : 'https://ui-avatars.com/api/?name=' . Auth::user()->name) }}"
                                        alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <li> <a class="dropdown-item" href="{{ route('upload', Auth::user()->id) }}">Profile
                                            account</a></li>
                                    <li> <a class="dropdown-item" href="{{ route('mn.profile') }}">Manage profile</a>
                                    </li>
                                    {{-- <a href="{{ route('bookmarks') }}">Bookmarks</a> --}}
                                    {{-- <a href="{{ route('savejobs') }}">Save a Jobs</a> --}}
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">Log
                                                out</a>
                                        </form>
                                    </li>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-auto d-md-none">
                            <a href="{{ route('login') }}">
                                <i class="fa-regular fa-circle-user"></i>
                            </a>
                        </div>
                    @endauth
                    <div class="col-12 d-none d-md-block">
                        <ul
                            class="navbar-nav mx-auto mb-2 mb-md-0 align-items-center justify-content-md-center gap-md-4">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jobshow') }}">Find a Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                            </li>
                            @if (Route::has('login'))
                                {{-- notification --}}
                                @if (Auth::check())
                                    <li class="nav-item dropdown">
                                        <button class="nav-link" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-bell position-relative">
                                                @if (Auth::user()->unreadNotifications->count() > 0)
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{ Auth::user()->unreadNotifications->count() }}
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                @endif
                                            </i>
                                        </button>
                                        <ul class="dropdown-menu list-notification overflow-y-scroll" style="max-height:500px">
                                            <li>
                                                <h6 class="dropdown-header">Notifications</h6>
                                            </li>
                                            @forelse (Auth::user()->notifications as $noti)
                                                @if (!empty($noti['data']['type']) && $noti['data']['type'] == 'approve')
                                                    <li>
                                                        <a class="dropdown-item white-space-normal {{ $noti->read_at ? '' : 'active' }} p-3"
                                                            href={{ route('jointeam', $noti['data']['job']['id']) }}>
                                                            <div class="row gx-3">
                                                                <div class="col-auto">
                                                                    <img src="/images/{{ $noti['data']['job']['image'] }}"
                                                                        width="60" height="60"
                                                                        style="border-radius: 5px; object-fit: cover">
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <p class="mb-2 fs-md-14px">
                                                                                {{ $noti['data']['user']['name'] }}
                                                                                Get you
                                                                                on the Team</p>
                                                                        </div>
                                                                        <div class="col-12 col-lg-auto">
                                                                            <span class="mb-2 fs-md-12px">
                                                                                {{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="dropdown-item white-space-normal {{ $noti->read_at ? '' : 'active' }} p-3"
                                                            href={{ route('jointeam', $noti['data']['job']['id']) }}>
                                                            <div class="row gx-3">
                                                                <div class="col-auto">
                                                                    <img src="{{ $noti['data']['user']['image'] }}"
                                                                        width="60" height="60"
                                                                        style="border-radius: 5px; object-fit: cover">
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <p class="mb-2 fs-md-14px">
                                                                                {{ $noti['data']['user']['name'] }}
                                                                                Apply for a Team on your post</p>
                                                                        </div>
                                                                        <div class="col-12 col-lg-auto">
                                                                            <span class="mb-2 fs-md-12px">
                                                                                {{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endif
                                            @empty
                                                <li>
                                                    <p class="p-3">No notification</p>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </li>
                                @endif

                                {{-- sign in and sign up --}}
                                @auth
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <img class="avatar-nav"
                                                src="{{ Auth::user()->image ? Auth::user()->image : (Auth::user()->profile_photo_path ? Auth::user()->profile_photo_path : 'https://ui-avatars.com/api/?name=' . Auth::user()->name) }}"
                                                alt="">
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li> <a class="dropdown-item"
                                                    href="{{ route('upload', Auth::user()->id) }}">Profile
                                                    account</a></li>
                                            <li><a class="dropdown-item" href="{{ route('mn.profile') }}">Manage
                                                    profile</a></li>
                                            {{-- <a href="{{ route('bookmarks') }}">Bookmarks</a> --}}
                                            {{-- <a href="{{ route('savejobs') }}">Save a Jobs</a> --}}
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">Log
                                                        out</a>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"
                                            class="login font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                                            In</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="nav-link">
                                                <button class="btn btn-dark">
                                                    Sign Up
                                                </button>
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>

                <div style="max-width: 280px" class="offcanvas offcanvas-start bg-primary d-md-none" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            <img src="/images/logo-final-white.svg" class="logo" alt="">
                        </h5>
                        <i class="fa-regular fa-circle-xmark link-light fs-3" data-bs-dismiss="offcanvas"
                        aria-label="Close"></i>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav mx-auto mb-2 mb-md-0 align-items-lg-center gap-md-4">
                            <li class="nav-item ">
                                <a class="nav-link link-light" href="{{ route('jobshow') }}">Find a Team</a>
                            </li>
                            <hr class="border-white border-2 my-2">
                            <li class="nav-item">
                                <a class="nav-link link-light" href="{{ route('profile') }}">Profile</a>
                            </li>
                            <hr class="border-white border-2 my-2">
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="main_section">
        @yield('content')
    </section>
    <footer>
        <div id="footer">
            <div class="text-center mb-4">
                <img src="/images/logo-final-white.svg" class="logo" alt="">
            </div>
            <div class="d-flex justify-content-center gap-5">
                <a href="{{ route('jobshow') }}" class="link-light  link-underline-opacity-0">find a team</a>
                <a href="{{ route('profile') }}" class="link-light  link-underline-opacity-0">profile</a>
            </div>
            <div class="copyright mt-5">
                <p class="text-center text-white fs-6">COPYRIGHT © ALL RIGHTS RESERVED LOGO</p>
            </div>
        </div>
    </footer>

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
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> --}}
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

@yield('script')

</html>
