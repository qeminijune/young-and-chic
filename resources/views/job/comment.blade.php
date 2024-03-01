@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/comment.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
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
                <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
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
                <img src="{{ $work->user->image ? $work->user->image : $work->user->profile_photo_path }}" alt="">
            </div>
            <h1>{{ $work->user->name }}</h1>
            <h2>{{ $work->detail }}</h2>
            <div class="work">
                @forelse ($work->images as $index=>$image)
                    @if ($index < 4)
                        {{-- <img src="{{ "/$image->url" }}" class="post" style="width:100%"
                            onclick="openModal();currentSlide(1)" class="hover-shadow cursor" /> --}}
                        {{-- <div class="col">
                            <img id="myImg" src="{{ "/$image->url" }}" class="post" style="width:100%;max-width:400px"
                                onclick="onClick(this)">
                            <div id="myModal" class="Modal">
                                The Close Button
                                <span class="close">&times;</span>

                                Modal Content (The Image)
                                <img class="modal-content" id="img01" style="width:100%">

                                Modal Caption (Image Text)
                                <div id="caption"></div>
                            </div>
                        </div> --}}

                        <img id="myImg" src="{{ "/$image->url" }}" class="post" alt="" style="width:100%;border-radius:30px">

                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>
                        {{-- <div class="w3-row-padding">
                            <div class="w3-container w3-third">
                                <img src="{{ "/$image->url" }}" style="width:100%;cursor:pointer" onclick="onClick(this)"
                                    class="post w3-hover-opacity">
                            </div>
                        </div>

                        <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                            <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                            <div class="w3-modal-content w3-animate-zoom">
                                <img id="img01" style="width:100%">
                            </div>
                        </div> --}}
                    @endif
                    @if ($index == 4)
                        <div class="post"></div>
                    @endif
                @empty
                @endforelse
            </div>
            <div class="date">
                <h3>{{ $work->user->name }}</h3>
                <h4>{{ \Carbon\Carbon::parse($work->created_at)->format('d/m/Y') }}</h4>
            </div>

            <div class="col mt-4">
                {{-- @if (!empty($rating)) --}}
                <form id="rate" class="" action="{{ route('rating.create', $work) }}" method="POST"
                    autocomplete="off">
                    @csrf

                    <input type="hidden" value="{{ !empty($rating) ? $rating->id : '' }}" name="id">
                    {{-- {{dd($work->toArray())}} --}}
                    <div class="rate">
                        <input type="radio" id="star5" class="rate" name="rating" value="5"
                            {{ !empty($rating) && $rating->rating <= 5 ? 'checked' : '' }} />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" class="rate" name="rating" value="4"
                            {{ !empty($rating) && $rating->rating <= 4 ? 'checked' : '' }} />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" class="rate" name="rating" value="3"
                            {{ !empty($rating) && $rating->rating <= 3 ? 'checked' : '' }} />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" class="rate" name="rating" value="2"
                            {{ !empty($rating) && $rating->rating <= 2 ? 'checked' : '' }} />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" class="rate" name="rating" value="1"
                            {{ !empty($rating) && $rating->rating <= 1 ? 'checked' : '' }} />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </form>
                {{-- @endif --}}
                <script>
                    const form = document.getElementById("rate")
                    const ratings = document.querySelectorAll('.rate')
                    ratings.forEach(r => {
                        r.addEventListener('click', () => {
                            const data = $('#rate').serialize();
                            $.post("/rating/" + {{ $work->id }}, data);
                        })
                    })
                </script>
            </div>
            <div class="comment">
                <i class="fa-regular fa-comment"></i>
            </div>
            <h5>{{ count($work->comments) }} Comments</h5>
            {{-- <div class="bookmark">
                <i class="fa-regular fa-bookmark"></i>
            </div> --}}
            <div class="line1">
                <hr>
            </div>
            <form action="{{ route('comment.create', $work->id) }}" method="post">
                @csrf
                <div class="box-cm">
                    <div class="pf-cm">
                        <img src="{{ $work->user->image ? $work->user->image : $work->user->profile_photo_path }}">
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
                    <img src="{{ $comment->user->image ? $comment->user->image : $comment->user->profile_photo_path }}">
                    <p>{{ $comment->user->name }}</p>
                    <h1>{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}</h1>
                    <h2>{{ $comment->comment }}</h2>
                </div>
            @empty
                <div class="no-cm">
                    no comment
                </div>
            @endforelse
        </div>
    </section>

    <script>
        // function openModal() {
        //     document.getElementById("myModal").style.display = "block";
        // }

        // function closeModal() {
        //     document.getElementById("myModal").style.display = "none";
        // }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

    <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
    </script>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    </script>
@endsection
