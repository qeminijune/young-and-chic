@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection
@section('content')
    <section>
        <div class="box-banner">
            <div class="banner">
                <img src="images/banner-home-v1.png">
                <a href="{{ route('jobshow') }}"><button>Find a Team and Create work now!!</button></a>
            </div>
        </div>
    </section>

    <section>
        <div class="box-desparti">
            <div class="banner-parti">
                <img src="images/banner-participant.png">
                <a href="{{ route('register') }}"><button>Sign up now</button></a>
            </div>
        </div>
    </section>

    <section>
        <div class="work-de">
            <img src="/images/y-designer-bam.png">
            <h1>Working Of The Month</h1>
            <h2>Best Young Designer<br>Of The Month</h2>
            <h3>(February)</h3>
            <h4>BamBam</h4>
            <a href="#"><button>View Working</button></a>
        </div>
    </section>

    <section id="slide">
        <input class="slide" type="radio" name="position" />
        <input class="slide" type="radio" name="position" checked />
        <input class="slide" type="radio" name="position" />
        <input class="slide" type="radio" name="position" />
        <input class="slide" type="radio" name="position" />
        <main id="carousel">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </main>
    </section>
    <div class="view-all">
        <a href="#"><button>View All Works By Young Designer</button><i class="fas fa-chevron-right"></i></a>
    </div>

    <section>
        <div class="de-work">
            <hr>
            <p>Young Designer's Works (350)</p>
            <div class="p1"><img src="images/Frame 28.jpg"></div>
            <div class="p2"><img src="images/Frame 29.jpg"></div>
            <div class="p3"><img src="images/Frame 30.jpg"></div>
            <div class="p4"><img src="images/Frame 31.jpg"></div>
            <div class="p5"><img src="images/Frame 32.jpg"></div>
            <div class="p6"><img src="images/Frame 33.jpg"></div>
            <div class="p7"><img src="images/Frame 34.jpg"></div>
            <div class="p8"><img src="images/Frame 20.jpg"></div>
            <div class="p9"><img src="images/Frame 21.jpg"></div>
            <div class="p10"><img src="images/Frame 22.jpg"></div>
            <div class="p11"><img src="images/Frame 25.jpg"></div>
            <div class="p12"><img src="images/Frame 26.jpg"></div>
            <div class="p13"><img src="images/Frame 27.jpg"></div>
            <div class="p14"><img src="images/Frame 11.jpg"></div>
            <div class="p15"><img src="images/Frame 12.jpg"></div>
            <div class="p16"><img src="images/Frame 13.jpg"></div>
            <div class="p17"><img src="images/Frame 14.jpg"></div>
            <div class="p18"><img src="images/Frame 15.jpg"></div>
            <div class="p19"><img src="images/Frame 16.jpg"></div>
            <div class="p20"><img src="images/Frame 17.jpg"></div>
            <div class="p21"><img src="images/Frame 24.jpg"></div>

            {{-- <a href="#"><button>SEE MORE</button><i class="fas fa-chevron-right"></i></a> --}}
        </div>
    </section>
@endsection
@section('script')
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
@endsection
