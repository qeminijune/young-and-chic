@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teammate.css') }}">
@endsection
@section('content')
    <section>
        <div class="topic-pfupload">
            <div class="event">
                <a href="/lastproject"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
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
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="box-teammate">
            <div class="teammate">
                <hr>
                <p>Teammates</p>
                <div class="teammate-pj1">
                    <div class="set-tm">
                        <img src="images/pf-1.png" alt="">
                        <div class="tm-name">
                            <h1>Pissaro</h1>
                            <h2>Makeup Artist</h2>
                        </div>
                    </div>
                    <div class="set-tm">
                        <img src="images/pf-2.png" alt="">
                        <div class="tm-name">
                            <h1>Cezanne</h1>
                            <h2>Model</h2>
                        </div>
                    </div>
                    <div class="set-tm">
                        <img src="images/pf-5.png" alt="">
                        <div class="tm-name">
                            <h1>Bonnard</h1>
                            <h2>Photographer</h2>
                        </div>
                    </div>
                </div>

                <div class="teammate-pj2">
                    <div class="set-tm">
                        <img src="images/pf-4.png" alt="">
                        <div class="tm-name">
                            <h1>Matisse</h1>
                            <h2>Tailor</h2>
                        </div>
                    </div>
                    <div class="set-tm">
                        <img src="images/pf-3.png" alt="">
                        <div class="tm-name">
                            <h1>Seurat</h1>
                            <h2>Model</h2>
                        </div>
                    </div>
                    <div class="set-tm">
                        <img src="images/pf-6.png" alt="">
                        <div class="tm-name">
                            <h1>Matisse</h1>
                            <h2>Model</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
