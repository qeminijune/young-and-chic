@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection
@section('content')
    <section>
        <div class="box-banner position-relative">
            <div class="banner">
                <img class="img-fluid" src="images/banner-home-v1.png">
                <div class="position-absolute section-1 w-100 text-center start-50 translate-middle-x ">
                    <a class="btn  btn-home btn-primary rounded-pill" href="{{ route('jobshow') }}">Find a Team and Create
                        work
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
                <div class="position-absolute section-2">
                    <a class="btn  btn-home btn-primary rounded-pill" href="{{ route('register') }}">Sign up now</a>
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
                    <a href="{{ route('upload', $rating->user->id) }}"><button
                            class="btn btn-home btn-primary rounded-pill mt-4">View Profile
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

    @if ($works->count() > 0)
        <section>
            <div>
                <p class="text-center mt-4 fw-bold fs-3">Young Designer's Works ({{ $works->count() }})</p>
                <div class="young-designer-grid">
                    {{-- <div class="span-1">
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
                <div class="span-1"><img class="w-100 h-100 object-fit-cover" src="images/Frame 24.jpg"></div> --}}
                    @php
                        $spans = ['span-1', 'span-2', 'span-1', 'span-1', 'span-1', 'span-1', 'span-1'];
                        $index = 0;
                    @endphp

                    @foreach ($works as $work)
                        @if ($work->images->isNotEmpty())
                            <div class="work-item {{ $spans[$index % count($spans)] }}" data-id="{{ $work->user->id }}"
                                data-bs-toggle="modal" data-bs-target="#galleryProfile">
                                <img class="w-100 h-100 object-fit-cover" src="{{ $work->images->first()->url }}">
                                <a class="upload-link" href="{{ route('upload', $work->user->id) }}">
                                    <p id="user-name"
                                        class="position-absolute bottom-0 left-0 px-4 py-2 text-center text-white fw-bold">
                                        {{ $work->user->name }}</p>
                                </a>
                            </div>
                            @php $index++; @endphp
                        @endif
                    @endforeach
                </div>

                <div class="modal fade" id="galleryProfile" tabindex="-1" aria-labelledby="galleryProfileLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content bg-transparent">
                            <div class="modal-body d-flex align-items-center justify-content-center" id="modal-body">
                                <div id="close" class="text-end position-absolute top-0 end-0" style="padding: 20px"><i
                                        class="fas fa-close text-white link-light fs-3" data-bs-dismiss="modal"
                                        aria-label="Close"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <a href="#"><button>SEE MORE</button><i class="fas fa-chevron-right"></i></a> --}}
            </div>
        </section>
    @endif
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".upload-link").click(function(e) {
                event.stopPropagation();
            })
            $('.work-item').click(function() {
                let id = $(this).data('id');
                const close = $('#close').clone()
                const elem = $(this).clone();
                const body = $('#modal-body').html(elem.append(close));
            })
        })
    </script>
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
