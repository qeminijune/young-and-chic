@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upload.css') }}">
@endsection
@section('content')
    <section>
        <div class="topic-pfupload">
            <div class="event">
                <a href="/"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
            </div>
            <img src="images/banner-upload.jpg">
        </div>
    </section>

    <section>
        <div class="profile">
            <img src="images/profile-stroke.png">
            <p>{{ Auth::user()->name }}</p>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            {{-- <button type="button" class="uploadbtn" data-toggle="modal" data-target="#uploadModal">Upload Works</button> --}}
            <!-- Button trigger modal -->
            <button type="button" class="uploadbtn" data-bs-toggle="modal" data-bs-target="#uploadModal">
                Upload Work
            </button>

            <!-- Modal -->
            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body create_post">
                            <form method="POST" action="{{ route('work.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label>Discription</label>
                                    <textarea name="detail" rows="4"></textarea>
                                </div>
                                <div>
                                    <label>Choose Images</label>
                                    <input type="file" name="images[]" multiple>
                                </div>
                                <hr>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <h1>Following</h1>
            <h2>30</h2>
            <h3>Followers</h3>
            <h4>4k</h4>
        </div>
    </section>

    <section>
        <div class="abtme">
            <p>About Me</p>
            <hr>
            <i class="fa-solid fa-cake-candles"></i>
            <h1>Born June 26, 2000</h1>
            <hr>
            <i class="fa-solid fa-location-dot"></i>
            <h2>2239 Hog Camp Road Schaumburg</h2>
            <hr>
            <i class="fa-solid fa-envelope"></i>
            <h3>{{ Auth::user()->email }}</h3>
            <hr>
            <i class="fa-solid fa-phone"></i>
            <h4>091-XXX-XXXX</h4>
            <hr>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-x-twitter"></i>
            <hr>
        </div>
    </section>

    <section id="box">
        <p>My Works</p>
        <div class="line">
            <hr>
        </div>
        @forelse ($works as $work)
            <a href="{{ route('comment', $work->id) }}">
                <div class="works">
                    <div class="pf">
                        <img src="/images/profile.png">
                    </div>
                    <h1>{{ $work->user->name }}</h1>
                    <i class="fa-solid fa-ellipsis"></i>
                    <h2>{{ $work->detail }}</h2>
                    <div class="work">
                        @forelse ($work->images as $index=>$image)
                            @if ($index < 3)
                                <img src="{{ "$image->url" }}" class="post" />
                            @endif
                            @if ($index == 3)
                                <div class="post"></div>
                            @endif
                        @empty
                        @endforelse
                    </div>
                    <h3>{{ $work->user->name }}</h3>
                    <h4>{{ \Carbon\Carbon::parse($work->created_at)->format('d/m/Y') }}</h4>
                    <div class="star1">
                        <i class="fas fa-star"></i>
                        <h1>200</h1>
                    </div>
                    <div class="comment">
                        <i class="fa-regular fa-comment"></i>
                    </div>
                    <h5>90 Comments</h5>
                    <div class="bookmark">
                        <i class="fa-regular fa-bookmark"></i>
                    </div>
                    <div class="line1">
                        <hr>
                    </div>
                </div>
            </a>
        @empty
        @endforelse
    </section>
@endsection
