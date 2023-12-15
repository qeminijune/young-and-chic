@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection
@section('content')
    <section>
        <div class="banner">
            <img src="/images/banner-home.png">
        </div>
    </section>
    <section>
        <video id="myvideo" autoplay loop muted controls>
            <source src="video/event.mp4" type="video/mp4">
        </video>

        <div class="event">
            <!-- <img src="images/event-home.jpg"> -->
            <h1>A DAY OF FASHION</h1>
            <p>YOUNG & CHIC</p>
            <h2>YOUNG & CHIC FASHION EVENT
                <br>OCTOBER 22-22 NOVEMBER 2024.
            </h2>
            <a href="{{ route('event') }}" class="b1"><button>VIEW THIS EVENT</button></a>
            <a href="{{ route('all.event') }}" class="b2"><button>VIEW ALL EVENT</button></a>
        </div>
        <!-- <div style="width:100%;height:0px;position:relative;padding-bottom:56.250%;"><iframe src="https://streamable.com/e/ht8el5" frameborder="0" width="100%" height="100%" allowfullscreen style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;"></iframe></div> -->
    </section>

    {{-- <section>
        <div class="caption">
            <img src="/images/sunshine.png">
            <p>Shine up to<br>The young designer</p>
        </div>
    </section> --}}

    <section>
        <div class="work-de">
            <img src="images/Best_Designer.png">
            <h1>Working Of The Month</h1>
            <h2>Best Young Designer<br>Of The Month</h2>
            <h3>(November)</h3>
            <h4>THANADOL</h4>
        </div>
    </section>

    <!-- <section>
            <div class="carousel">
                <div class="card-carousel">
                    <div class="my-card">
                        <img src="images/work_yde1.jpg">
                    </div>
                    <div class="my-card">
                        <img src="images/work_yde2.jpg">
                    </div>
                    <div class="my-card">
                        <img src="images/work_yde3.jpg">
                    </div>
                </div>
            </div>
        </section> -->
    <section id="slide">
        <!-- <div class="prev"><i class="fas fa-chevron-left"></i></div> -->
        {{-- <div class="d-flex justify-content-center"> --}}

        {{-- </div> --}}
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

        {{-- <div class="slideshow-container">

        <div class="mySlides">
          <div class="numbertext">1 / 3</div>
          <img src="/images/work-yde1.png" style="width:50%">
          <div class="text">Caption Text</div>
        </div>

        <div class="mySlides">
          <div class="numbertext">2 / 3</div>
          <img src="/images/work-yde2.png" style="width:50%">
          <div class="text">Caption Two</div>
        </div>

        <div class="mySlides">
          <div class="numbertext">3 / 3</div>
          <img src="/images/work-yde3.png" style="width:50%">
          <div class="text">Caption Three</div>
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 3</div>
            <img src="/images/work-yde4.png" style="width:50%">
            <div class="text">Caption Two</div>
          </div>

          <div class="mySlides">
            <div class="numbertext">3 / 3</div>
            <img src="/images/work-yde5.png" style="width:50%">
            <div class="text">Caption Three</div>
          </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
          <span class="dot" onclick="currentSlide(4)"></span>
          <span class="dot" onclick="currentSlide(5)"></span>
        </div>
    </div> --}}
        <!-- <div class="next"><i class="fas fa-chevron-right"></i></div> -->
        {{-- <main>

        <div id="carousel">

           <div class="hideLeft">
            <img src="https://i1.sndcdn.com/artworks-000165384395-rhrjdn-t500x500.jpg">
          </div>

          <div class="prevLeftSecond">
            <img src="https://i1.sndcdn.com/artworks-000185743981-tuesoj-t500x500.jpg">
          </div>

          <div class="prev">
            <img src="https://i1.sndcdn.com/artworks-000158708482-k160g1-t500x500.jpg">
          </div>

          <div class="selected">
            <img src="https://i1.sndcdn.com/artworks-000062423439-lf7ll2-t500x500.jpg">
          </div>

          <div class="next">
            <img src="https://i1.sndcdn.com/artworks-000028787381-1vad7y-t500x500.jpg">
          </div>

          <div class="nextRightSecond">
            <img src="https://i1.sndcdn.com/artworks-000108468163-dp0b6y-t500x500.jpg">
          </div>

          <div class="hideRight">
            <img src="https://i1.sndcdn.com/artworks-000064920701-xrez5z-t500x500.jpg">
          </div>

        </div>

        <div class="buttons">
          <button id="prev">Prev</button>
          <button id="next">Next</button>
        </div>

      </main> --}}

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

            <a href="#"><button>SEE MORE</button><i class="fas fa-chevron-right"></i></a>
        </div>
    </section>

    <section>
        <div class="parti">
            <p>Participant</p>
            <h1>ผู้ช่วยสำหรับ Young Designer ที่จะทำให้คุณทำงานได้เร็วและมีประสิทธิภาพมากขึ้น
                <br>เพียงแค่โพสต์ตำแหน่งทีมงานที่คุณต้องการให้มาช่วย ก็สามารถมีผู้ช่วยทีมได้เลย!
                <br>สำหรับ Participant ที่ต้องการดีลกับ Young Designer
                <br>สามารถกด Apply Job ที่คุณสนใจได้ที่นี่เลย!
            </h1>
            <a href="#"><button>VIEW POST A JOB PAGE</button><i class="fas fa-chevron-right"></i></a>
            <div class="d1"><img src="images/Rectangle 707.jpg"></div>
            <div class="d2"><img src="images/Rectangle 710.jpg"></div>
            <div class="d3"><img src="images/Rectangle 711.jpg"></div>
            <div class="d4"><img src="images/Rectangle 708.jpg"></div>
            <div class="d5"><img src="images/Rectangle 706.jpg"></div>
        </div>
    </section>

@endsection
@section("script")
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
