@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/join-team.css') }}">
@endsection
@section('content')
    <div class="container">
        <section>
            <div class="topic-pfupload my-5">
                <div class="back">
                    <a class=" link-dark text-decoration-none d-inline-flex gap-4 align-items-center"
                        href="{{ url()->previous() }}">
                        <i class="fas fa-arrow-left"></i>
                        GO BACK
                    </a>
                </div>
            </div>
        </section>
        <section>
            <div class="box-content">
                <div class="jointeam-box">
                    {{-- {{dd($job->toArray())}} --}}
                    <div class="box-image">
                        <img src="/images/{{ $job->image }}" alt="">
                    </div>
                    <div class="box-pf">
                        <div class="pf-name">
                            <div class="pf">
                                <img src="{{ $job->user->image ? $job->user->image : $job->user->profile_photo_url }}"
                                    alt="">
                            </div>
                            <p>{{ $job->user->name }}</p>
                            <h5>(Young Designer)</h5>
                        </div>
                        <div class="role-parti">
                            <h1>Looking for Role</h1>
                            <h2 class="text-capitalize">{{ $job->participants }}</h2>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <h3>Looking for ...</h3>
                    <h4>{{ $job->full_description }}</h4>
                </div>

                @if ($job->user->id == Auth::user()->id)
                    <section>
                        <div class="new-apply mt-5">
                            {{-- @if ($job->user_apply->isEmpty()) --}}
                            <p class="title text-center">New Apply ({{ count($apply) }})</p>
                            <div class="row justify-center pf1">
                                @forelse ($apply as $userApply)
                                    <div class="col-md-6 text-center text-md-start">
                                        <form action="{{ route('apply', $userApply) }}" method="POST">
                                            @csrf
                                            <div class="d-inline-flex gap-3 align-items-center">
                                                @if ($userApply->status == 'wait')
                                                    <a class="text-decoration-none"
                                                        href="{{ route('upload', $userApply->user->id) }}">
                                                        <div class="d-inline-flex gap-3 align-items-center">
                                                            <img class="rounded-circle object-fit-cover avatar"
                                                                src="{{ $userApply->user->image ? $userApply->user->image : $userApply->user->profile_photo_url }}">
                                                            <h1 class="mb-0">{{ $userApply->user->name }}</h1>
                                                        </div>
                                                    </a>
                                                    <div>
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $userApply->user->id }}">
                                                        <button class="btn btn-outline-primary rounded-pill"
                                                            type="submit">Approve</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                @empty
                                    <div class="text-center text-body-tertiary">Empty...</div>
                                @endforelse
                            </div>
                        </div>
                        
                    </section>
                @else
                    @if (!empty($selfApply))
                        @if ($selfApply->status == 'wait')
                            <div class="wait">
                                Waiting for approval. Please check back at the notification bell.
                            </div>
                        @endif
                    @else
                        <div class="startbtn">
                            <a href="{{ route('apply', $job->id) }}">
                                <button>Apply</button>
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </section>
        {{-- {{dd($job->userApply->toArray())}} --}}
        <section>
            <hr>
            <div class="pf1">
                <div class="accepted">
                    {{-- <p>Accepted ({{ $approvecount }})</p> --}}
                    <p class="text-center text-lg-start">Approved ({{ count($approves) }})</p>
                    <div class="row">
                        @forelse ($approves as $userApply)
                            <div class="col-6 col-lg-4">
                                <a class="text-decoration-none" href="{{ route('upload', $userApply->user->id) }}">
                                    <div class="d-inline-flex align-items-center gap-3">
                                        <img class="rounded-circle object-fit-cover avatar"
                                            src="{{ $userApply->user->image ? $userApply->user->image : $userApply->user->profile_photo_url }}">
                                        <h1 class="mb-0">{{ $userApply->user->name }}</h1>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="text-center text-lg-start text-body-tertiary">Empty...</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @if ($job->user->id == Auth::user()->id && $job->status == 'start')
                <form action="{{ route('jointeam.close', $job->id) }}" method="POST">
                    @csrf
                    <div class="text-center mt-5">
                        <button class="btn btn-primary rounded-pill">Closed for the team</button>
                    </div>
                </form>
            @endif
        </section>
    </div>
@endsection
