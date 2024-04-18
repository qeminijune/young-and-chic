@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection
@section('content')
    <section>
        <div class="box-banner position-relative">
            <div class="banner">
                <img class="img-fluid" src="images/banner-home-v1.png">
                <div class="position-absolute bottom-0 start-50 translate-middle-x pb-4">
                    <a class="btn btn-primary rounded-pill" href="{{ route('jobshow') }}">Find a Team and Create work
                        now!!</a>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="box-desparti position-relative">
            <div class="banner-objective">
                <img src="images/banner-object-home.png" alt="">
            </div>
            <div class="banner-parti">
                <img src="images/banner-participant.png">
                <div class="position-absolute" style="bottom: 4%;left: 10%;">
                    <a class="btn btn-primary rounded-pill" href="{{ route('register') }}">Sign up now</a>
                </div>
            </div>
        </div>
    </section>
    @if ($rating)
        <section class="wrap-flex">
            <div class="work-de flex">

                <div class="flex-item" style="flex:0 0 400px">
                    <div class="pf-designer">
                        <img class="image" src="{{ $rating->user->image }}">
                        <img class="mark" src="/images/mark.png">
                    </div>
                </div>

                <div class="flex-item">
                    <h1>Working Of The Month</h1>
                    <h2>Best Young Designer<br>Of The Month</h2>
                    <h3>({{ \Carbon\Carbon::now()->format('F') }})</h3>
                    <a href="{{ route('upload', $rating->user->id) }}"><button>View Profile
                            {{ $rating->user->name }}</button></a>
                </div>

            </div>
        </section>
    @endif
    @if ($rating)
        <section id="slide">
            @forelse ($rating->work->images as $index=>$image)
                <input class="slide" type="radio" name="position" {{ $index == 0 ? 'checked' : '' }} />
            @empty
            @endforelse
            <main id="carousel">
                @forelse ($rating->work->images as $image)
                    <div class="item" style="background-image: url({{ $image->url }})"></div>
                @empty
                @endforelse
            </main>
        </section>
    @endif
    {{-- <div class="view-all">
        <a href="#"><button>View All Works By Young Designer</button><i class="fas fa-chevron-right"></i></a>
    </div> --}}

    <section>
        <div>
            <p class="text-center mt-4 fw-bold">Young Designer's Works (21)</p>
            <div class="young-designer-grid">
                <div class="span-1">
                    <img class="w-100 h-100 object-fit-cover" src="images/Frame 28.jpg">
                </div>
                <div class="span-2">
                    <img class="w-100 h-100 object-fit-cover" src="images/Frame 29.jpg">
                </div>
                <div class="span-1">
                    <img class="w-100 h-100 object-fit-cover" src="images/Frame 30.jpg">
                </div>
                <div class="span-1">
                    <img class="w-100 h-100 object-fit-cover" src="images/Frame 31.jpg">
                </div>
                <div class="span-1">
                    <img class="w-100 h-100 object-fit-cover" src="images/Frame 32.jpg">
                </div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 33.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 34.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 20.jpg"></div>
                <div class="span-2"><img class="w-100 h-100 object-fit-cover" src="images/Frame 21.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 22.jpg"></div>
                <div class="span-2"><img class="w-100 h-100 object-fit-cover" src="images/Frame 25.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 26.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 27.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 11.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 12.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 13.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 14.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 15.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 16.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 17.jpg"></div>
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 24.jpg"></div>

            </div>
            {{-- <a href="#"><button>SEE MORE</button><i class="fas fa-chevron-right"></i></a> --}}
        </div>
    </section>
@endsection
@section('script')
    {{-- <script>
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
    </script> --}}
@endsection
