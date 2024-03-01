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
            <img src="{{ $user->bg ? $user->bg : '/images/bg-create-pic.png' }}">
        </div>
    </section>

    <div class="wrap-content">
        <section id="content">
            <div class="abtme">
                <section>
                    <div class="profile">
                        <img src="{{ $user->image ? $user->image : $user->profile_photo_path }}">
                        <p>{{ $user->name }}</p>
                        <div class="star">
                            @foreach (range(1, 5) as $index => $_)
                                @if ($averageRating >= $index + 1)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endforeach
                        </div>
                        {{-- <button type="button" class="uploadbtn" data-toggle="modal" data-target="#uploadModal">Upload Works</button> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="uploadbtn" data-bs-toggle="modal" data-bs-target="#uploadModal">
                            Upload Work
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body create_post">
                                        <form method="POST" action="{{ route('work.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="box-discrip">
                                                <label>Discription</label>
                                                <textarea name="detail" rows="4"></textarea>
                                            </div>
                                            <div class="chooseimg">
                                                <h9>*File size does not exceed 2 MB.</h9><br>
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
                        {{-- <div class="box-fl">
                            <h1>Following</h1>
                            <h2>30</h2>
                            <h3>Followers</h3>
                            <h4>4k</h4>
                        </div> --}}
                    </div>
                </section>
                <p>About Me</p>
                <hr>
                <div class="box-role">
                    <div class="role">
                        <h5>Role</h5>
                        <h6>{{ $user->type_user ? $user->type_user : 'N/A' }}</h6>
                    </div>
                    {{-- <div class="skill">
                        <h7>Skill</h7>
                        <h8>tailor, makeup artist</h8>
                    </div> --}}
                </div>
                <hr>
                <div class="mail">
                    <i class="fa-solid fa-envelope"></i>
                    <h3>{{ $user->email }}</h3>
                </div>
                <hr>
                <div class="phone">
                    <i class="fa-solid fa-phone"></i>
                    <h4>{{ $user->tel ? $user->tel : 'N/A' }}</h4>
                    {{-- <i class="fa-solid fa-circle-info"></i> --}}
                </div>
                <hr>
                <div class="address">
                    <i class="fa-solid fa-location-dot"></i>
                    <h2>{{ $user->address ? $user->address : 'N/A' }}</h2>
                </div>
                <hr>
                <div class="born">
                    <i class="fa-solid fa-cake-candles"></i>
                    <h1>Born {{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('F j, Y') : 'N/A' }}</h1>
                </div>
                <hr>
                <div class="social">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                </div>
                <hr>
            </div>
            <div class="content-right">
                <section id="btnteam">
                    @if (!empty($job))
                        @if ($job->user_id == Auth::user()->id)
                            <div class="btnjointeam">
                                <a href="{{ route('jointeam', $job->id) }}"><i class="fa-solid fa-user-group"></i>Fine My
                                    Team</a>
                            </div>
                        @else
                            <div class="btnjointeam">
                                <a href="{{ route('jointeam', $job->id) }}"><i class="fa-solid fa-user-group"></i>Join with
                                    Me</a>
                            </div>
                        @endif
                    @endif

                    <div class="btnlastpj">
                        <a href="/lastproject/{{ $user->id }}"><i class="fas fa-business-time"></i>Project Collab</a>
                    </div>
                </section>

                <section id="box">
                    <p>My Portfolio</p>
                    <div class="line">
                        <hr>
                    </div>
                    @forelse ($works as $work)
                        <a href="{{ route('comment', $work->id) }}">
                            <div class="works">
                                <div class="work-name">
                                    <div class="box-pf">
                                        <div class="pf">
                                            <img src="{{ $work->user->image ? $work->user->image : $work->user->profile_photo_url }}" alt=" ">
                                        </div>
                                        <h1>{{ $work->user->name }}</h1>
                                    </div>
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>

                                <h2>{{ $work->detail }}</h2>
                                <div class="work">
                                    @forelse ($work->images as $index=>$image)
                                        @if ($index < 3)
                                            <img src="/{{ "$image->url" }}" class="post" />
                                        @endif
                                        @if ($index == 3)
                                            <div class="post"></div>
                                        @endif
                                    @empty
                                    @endforelse
                                </div>

                                <h3>{{ $work->user->name }}
                                    {{ \Carbon\Carbon::parse($work->created_at)->format('d/m/Y') }}</h3>
                                <div class="box-comment">
                                    <div class="star1">
                                        <i class="fas fa-star"></i>
                                        <h1>{{ $work->ratings }}</h1>
                                    </div>
                                    <div class="comment">
                                        <i class="fa-regular fa-comment"></i>
                                        <h5>{{ count($work->comments) }}</h5>
                                    </div>
                                </div>

                                {{-- <div class="bookmark">
                                    <i class="fa-regular fa-bookmark"></i>
                                </div> --}}
                                <div class="line1">
                                    <hr>
                                </div>
                            </div>
                        </a>
                    @empty
                    @endforelse
                </section>
            </div>
        </section>
    </div>
@endsection
