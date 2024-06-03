@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/last-project.css') }}">
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
            <div class="box-project">
                <div class="row">
                    @forelse ($jobs as $job)
                        <div class="col-md-4 col-lg-3">
                            <div class="text-decoration-none text-dark"
                                onclick="window.location='{{ route('jointeam', $job->id) }}'">
                                <div class="card-product d-flex flex-sm-column justify-content-center">
                                    <img class="card-product-image" src="{{ $job->image }}" alt="">
                                    <div class="card-product-body flex-grow-1">
                                        <div
                                            class="d-flex gap-2 align-items-center justify-content-start justify-content-md-center">
                                            <img width="20" height="20" class="card-product-avatar rounded-circle"
                                                src={{ $job->user->image ? $job->user->image : ($job->user->profile_photo_path ? $job->user->profile_photo_path : 'https://ui-avatars.com/api/?name=' . urlencode($job->user->name) . '&background=0D8ABC&color=fff') }}
                                                alt="">
                                            <p class="mb-0 fw-bold fs-12px">{{ $job->user->name }}
                                                <span class="text-body-tertiary text-capitalize">|
                                                    {{ $job->user->type_user }}
                                                </span>
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="d-flex flex-column gap-3">
                                            <div>
                                                <h4 class="fs-6 text-md-center mb-2">
                                                    <strong>Find {{ $job->participants }}</strong>
                                                </h4>
                                                <div class="d-flex gap-2 justify-content-start justify-content-md-center">
                                                    <span
                                                        class="py-1 text-primary px-2 rounded-pill border border-primary fs-12px text-capitalize">{{ $job->type }}</span>
                                                    <span
                                                        class="py-1 text-primary px-2 rounded-pill border border-primary fs-12px text-capitalize">{{ $job->employment }}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="hint fs-12px text-md-center mb-2">Looking For...</p>
                                                <p class="ellipsis-2 fw-light fs-12px text-md-center mb-0">
                                                    {{ $job->description }}</p>
                                            </div>
                                        </div>

                                        @if (Auth::user()->type_user == 'participant')
                                            @if (count($job->userApply) == 0)
                                                <div class="text-center mt-4 d-md-block d-none">
                                                    <a href="{{ route('apply', $job->id) }}"
                                                        class="apply btn btn-primary rounded-pill" type="button">Apply</a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 200px">
                            <i class="fa-solid fa-box-open fs-1 text-body-tertiary"></i>
                            <div class="text-center text-body-tertiary">Empty...</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
