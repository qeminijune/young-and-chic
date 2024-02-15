@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jointeam-nothing.css') }}">
@endsection
@section('content')
    <section>
        <div class="topic-pfupload">
            <div class="event">
                <a href="/index.html"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
            </div>
        </div>
    </section>

    <section>
        <div class="noteam">
            <img src="images/icon-nothing.png" alt="">
            <p>Sorry. We don't have a teammate yet.<br>Thank you for your interest.</p>
        </div>
    </section>
@endsection
