@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/js" href="{{ asset('js/slide.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/discover.css') }}">
@endsection
@section('content')
    <section id="frame">
        <!-- <nav id="side-nav">
            <p>Menu</p>
            <a href="#hover">Hover</a>
            <a href="#compare">Compare</a>
            <a href="#slide1">Slide 1</a>
        </nav> -->
        <section id="hover">
            <!-- <h1>Hover the Pictures</h1> -->
            <div class="gallery">
                <figure class="photo">
                    <a href=""><img src="/images/designer.jpg" alt="Pink and blue clouds at sunset. "
                            title="Photo by Jeremy Doddridge for Unsplash"></a>
                    <!-- <figcaption>8 PM, Summer</figcaption> -->
                </figure>
                <figure class="photo">
                    <a href=""><img src="/images/model.jpg"
                            alt="Low angle view up into a sky filled with deep blue clouds. "
                            title="Photo by Matthew Brayer for Unsplash"></a>
                    <!-- <figcaption>3 PM, Winter</figcaption> -->
                </figure>
                <figure class="photo">
                    <a href=""><img src="/images/tailor.jpg" alt="Heavy gray clouds in the sky. "
                            title="Photo by Simeon Muller for Unsplash"></a>
                    <!-- <figcaption>10 AM, Summer Storm</figcaption> -->
                </figure>
                <figure class="photo">
                    <a href="{{ route('discovermakeup') }}"><img src="/images/makeup.jpg" alt="Deep orange clouds at sunset. "
                            title="Photo by Laura Vinck for Unsplash"></a>
                    <!-- <figcaption>5 PM, Autumn</figcaption> -->
                </figure>
                <figure class="photo">
                    <a href=""><img src="/images/hairstylist.jpg"
                            alt="Clouds in shades of dark blue and magenta at sunset. "
                            title="Photo by Szabo Viktor for Unsplash"></a>
                    <!-- <figcaption>7 PM, Spring</figcaption> -->
                </figure>
            </div>
        </section>
    </section>
@endsection
