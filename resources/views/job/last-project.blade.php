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
                @forelse ($jobs as $job)
                    <div class="pj1">
                        <img src="/images/{{ $job->image }}" alt="">
                        <div class="pf-1">
                            <img src="{{ $job->user->image ? $job->user->image : $job->user->profile_photo_url }}"
                                alt="">
                            <p>{{ $job->user->name }}</p>
                        </div>
                        <div class="role">
                            <h1>Role</h1>
                            <h2>{{ $job->participants }}</h2>
                        </div>
                        <hr>
                        <h3>{{ $job->name }}</h3>
                        <h4>{{ $job->description }}</h4>
                        <h5>{{ $job->full_description }}</h5>
                        <div class="btn-viewtm">
                            <a href="{{ route('jointeam', $job->id) }}">View teammate</a>
                        </div>
                    </div>
                @empty
                    ไม่มีงาน
                @endforelse
            </div>
        </div>
    </section>
@endsection
