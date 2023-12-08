@extends('layouts.main')
@section('content')
<section>
    <div class="topic-event">
        <div class="event">
            <a href="/"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
        </div>
        <h1>EVENT ALL</h1>
        <h2>Lorem ipsum dolor sit amet consectetur. Sodales enim vulputate consequat et egestas<br>maecenas. Faucibus congue ut scelerisque sit. Facilisi enim maecenas mi lorem vestibulum<br> diam. Lacus vitae cum viverra massa. Dictum neque feugiat
            quam quis ultricies tempor.<br> Eget diam interdum lectus quis eget ornare. </h2>
    </div>
</section>

<!-- start all_event -->
<section>
    <div class="container1">
        <img src="/images/ae-1.jpg" alt="Avatar" class="image">
        <div class="overlay">
            <div class="text">
                <a href="{{ route('event') }}">Read More</a>
            </div>
        </div>
    </div>
    <div class="desc_evnt1">
        <h1>Name Event<br>The duration of the event</h1>
    </div>
</section>

<section>
    <div class="container2">
        <img src="/images/ae-2.jpg" alt="Avatar" class="image">
        <div class="overlay">
            <div class="text">
                <a href="{{ route('event') }}">Read More</a>
            </div>
        </div>
    </div>
    <div class="desc_evnt2">
        <h1>Name Event<br>The duration of the event</h1>
    </div>
</section>

<section>
    <div class="container3">
        <img src="/images/ae-3.jpg" alt="Avatar" class="image">
        <div class="overlay">
            <div class="text">
                <a href="{{ route('event') }}">Read More</a>
            </div>
        </div>
    </div>
    <div class="desc_evnt3">
        <h1>Name Event<br>The duration of the event</h1>
    </div>
</section>

<section>
    <div class="container4">
        <img src="/images/ae-4.jpg" alt="Avatar" class="image">
        <div class="overlay">
            <div class="text">
                <a href="{{ route('event') }}">Read More</a>
            </div>
        </div>
    </div>
    <div class="desc_evnt4">
        <h1>Name Event<br>The duration of the event</h1>
    </div>
</section>

<section>
    <div class="container5">
        <img src="/images/ae-5.jpg" alt="Avatar" class="image">
        <div class="overlay">
            <div class="text">
                <a href="{{ route('event') }}">Read More</a>
            </div>
        </div>
    </div>
    <div class="desc_evnt5">
        <h1>Name Event<br>The duration of the event</h1>
    </div>
</section>

<section>
    <div class="container6">
        <img src="/images/ae-6.jpg" alt="Avatar" class="image">
        <div class="overlay">
            <div class="text">
                <a href="/event.html">Read More</a>
            </div>
        </div>
    </div>
    <div class="desc_evnt6">
        <h1>Name Event<br>The duration of the event</h1>
    </div>
</section>

<section>
    <div class="more">
        <a href="/"><button>SEE MORE</button><i class="fas fa-chevron-right"></i></a>
    </div>
</section>
<!-- end all_event -->
@endsection
