@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/last-project.css') }}">
@endsection
@section('content')
    <section>
        <div class="topic-pfupload">
            <div class="event">
                <a href="/"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
            </div>
        </div>
    </section>

    <section>
        <div class="box-project">
            <div class="last-project">
                <div class="pj1">
                    <img src="images/pj1.jpg" alt="">
                    <div class="pf-1">
                        <img src="images/profile.png" alt="">
                        <p>Thanadol</p>
                    </div>
                    <div class="role">
                        <h1>Role</h1>
                        <h2>Tailor</h2>
                    </div>
                    <hr>
                    <h3>Project name</h3>
                    <h4>Lorem ipsum dolor sit amet consectetur.<br> Turpis ut nibh arcu hendrerit orci lectus<br> aliquam.
                        Tincidunt sed faucibus rhoncus<br> commodo eleifend leo elementum. Eu purus<br> enim rhoncus euismod
                        mi condimentum<br> consectetur.
                        Ultricies suscipit nec libero<br> eget pellentesque consectetur ultrices.</h4>
                    <div class="btn-viewtm">
                        <a href="{{ route('teammate') }}">View teammate</a>
                    </div>
                </div>

                <div class="pj1">
                    <img src="images/pj2.jpg" alt="">
                    <div class="pf-1">
                        <img src="images/profile.png" alt="">
                        <p>Thanadol</p>
                    </div>
                    <div class="role">
                        <h1>Role</h1>
                        <h2>Tailor</h2>
                    </div>
                    <hr>
                    <h3>Project name</h3>
                    <h4>Lorem ipsum dolor sit amet consectetur.<br> Turpis ut nibh arcu hendrerit orci lectus<br> aliquam.
                        Tincidunt sed faucibus rhoncus<br> commodo eleifend leo elementum. Eu purus<br> enim rhoncus euismod
                        mi condimentum<br> consectetur.
                        Ultricies suscipit nec libero<br> eget pellentesque consectetur ultrices.</h4>
                    <div class="btn-viewtm">
                        <a href="{{ route('teammate') }}">View teammate</a>
                    </div>
                </div>

                <div class="pj1">
                    <img src="images/pj3.jpg" alt="">
                    <div class="pf-1">
                        <img src="images/profile.png" alt="">
                        <p>Thanadol</p>
                    </div>
                    <div class="role">
                        <h1>Role</h1>
                        <h2>Tailor</h2>
                    </div>
                    <hr>
                    <h3>Project name</h3>
                    <h4>Lorem ipsum dolor sit amet consectetur.<br> Turpis ut nibh arcu hendrerit orci lectus<br> aliquam.
                        Tincidunt sed faucibus rhoncus<br> commodo eleifend leo elementum. Eu purus<br> enim rhoncus euismod
                        mi condimentum<br> consectetur.
                        Ultricies suscipit nec libero<br> eget pellentesque consectetur ultrices.</h4>
                    <div class="btn-viewtm">
                        <a href="{{ route('teammate') }}">View teammate</a>
                    </div>
                </div>

                <div class="pj1">
                    <img src="images/pj4.jpg" alt="">
                    <div class="pf-1">
                        <img src="images/profile.png" alt="">
                        <p>Thanadol</p>
                    </div>
                    <div class="role">
                        <h1>Role</h1>
                        <h2>Tailor</h2>
                    </div>
                    <hr>
                    <h3>Project name</h3>
                    <h4>Lorem ipsum dolor sit amet consectetur.<br> Turpis ut nibh arcu hendrerit orci lectus<br> aliquam.
                        Tincidunt sed faucibus rhoncus<br> commodo eleifend leo elementum. Eu purus<br> enim rhoncus euismod
                        mi condimentum<br> consectetur.
                        Ultricies suscipit nec libero<br> eget pellentesque consectetur ultrices.</h4>
                    <div class="btn-viewtm">
                        <a href="{{ route('teammate') }}">View teammate</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
