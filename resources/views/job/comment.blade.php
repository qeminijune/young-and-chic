@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/comment.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
@endsection
@section('content')
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <section>
        <div class="topic-pfupload">
            <div class="back">
                <a href="{{ route('upload') }}"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
            </div>
        </div>
    </section>

    <section>
        <div class="detail">
            <p>Post</p>
            <div class="line">
                <hr>
            </div>
            <div class="pf">
                <img src="/images/profile.png">
            </div>
            <h1>{{ $work->user->name }}</h1>
            <h2>{{ $work->detail }}</h2>
            <div class="work">
                @forelse ($work->images as $index=>$image)
                    @if ($index < 3)
                        <img src="{{ "/$image->url" }}" class="post" />
                    @endif
                    @if ($index == 3)
                        <div class="post"></div>
                    @endif
                @empty
                @endforelse
            </div>
            <h3>{{ $work->user->name }}</h3>
            <h4>{{ \Carbon\Carbon::parse($work->created_at)->format('d/m/Y') }}</h4>
            <div class="col mt-4">
                <form id="rate" class="" action="{{ route('rating.create', $work) }}" method="POST" autocomplete="off">
                    @csrf

                    <input type="hidden" value="{{!empty($rating)? $rating->id:"" }}" name="id">

                    <div class="rate">
                        <input type="radio" id="star5" class="rate" name="rating" value="5" {{ $rating->rating<=5?"checked":"" }}/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" class="rate" name="rating" value="4" {{ $rating->rating<=4?"checked":"" }}/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" class="rate" name="rating" value="3" {{ $rating->rating<=3?"checked":"" }}/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" class="rate" name="rating" value="2" {{ $rating->rating<=2?"checked":"" }}/>
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" class="rate" name="rating" value="1" {{ $rating->rating<=1?"checked":"" }}/>
                        <label for="star1" title="text">1 star</label>
                    </div>
                </form>
                <script>
                    const form = document.getElementById("rate")
                    const ratings = document.querySelectorAll('.rate')
                    ratings.forEach(r => {
                        r.addEventListener('click', () => form.submit())
                    })
                </script>
            </div>
            <div class="comment">
                <i class="fa-regular fa-comment"></i>
            </div>
            <h5>{{ count($work->comments) }} Comments</h5>
            <div class="bookmark">
                <i class="fa-regular fa-bookmark"></i>
            </div>
            <div class="line1">
                <hr>
            </div>
            <form action="{{ route('comment.create', $work->id) }}" method="post">
                @csrf
                <div class="box-cm">
                    <div class="pf-cm">
                        <img src="/images/profile.png">
                    </div>
                    <textarea name="comment" id="cm">
                    </textarea>
                    <div class="btn-post">
                        <button>Post</button>
                    </div>

                </div>
            </form>
            @forelse ($work->comments as $comment)
                <div class="cmt1">
                    <hr>
                    <img src="/images/lolla2.png">
                    <p>{{ $comment->user->name }}</p>
                    <h1>{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}</h1>
                    <h2>{{ $comment->comment }}</h2>
                </div>
            @empty
                no comment
            @endforelse
        </div>
    </section>
@endsection
