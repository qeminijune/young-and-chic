@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/comment.css') }}">
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
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
            color: #960021;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #8c011f;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #8c011f;
        }

        .star-rating-complete {
            color: #8c011f;
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
    </style>
@endsection

@section('content')
    <div class="content-container">
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <section>
            <div class="topic-pfupload my-5">
                <div class="back">
                    <a class=" link-dark text-decoration-none d-inline-flex gap-4 align-items-center"
                        href="{{route("go-back")}}"
                        >
                        <i class="fas fa-arrow-left"></i>
                        GO BACK
                    </a>
                </div>
            </div>
        </section>
        <section id="box">
            <p>Post</p>
            <div class="line">
                <hr>
            </div>
            <div class="works">
                <div class="work-name">
                    <div class="box-pf">
                        <div class="pf">
                            <img src="{{ $work->user->image ? $work->user->image : $work->user->profile_photo_url }}"
                                alt=" ">
                        </div>
                        <h1>{{ $work->user->name }}</h1>
                    </div>
                    @if (Auth::user()->id === $work->user->id)
                        <div class="dropdown">
                            <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis text-black"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        href="#">Edit</a></li>
                                <li>
                                    <form action="{{ route('work.destroy', $work->id) }}" method="post">
                                        @csrf
                                        <button class="dropdown-item" href="#">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('work.update', $work->id) }}" method="post">
                                    @csrf
                                    <div class="py-4">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img class="avatar"
                                                    src="{{ $work->user->image ? $work->user->image : $work->user->profile_photo_url }}"
                                                    alt="">
                                            </div>
                                            <div class="col">
                                                <textarea placeholder="Write a description" class="form-control border-0" name="detail" id="" rows="3">{{ $work->detail }}</textarea>
                                            </div>
                                            <div class="col-auto align-self-end">
                                                <button class="btn btn-primary rounded-pill px-4 d-md-block d-none">Edit
                                                    Post</button>
                                                <button class="btn btn-primary rounded-pill d-block d-md-none"><i
                                                        class="fa-regular fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>{{ $work->detail }}</h2>
                <div class="work">
                    @forelse ($work->images as $index=>$image)
                        @if ($index < 3)
                            <div class="post" data-index={{ $index }} data-bs-toggle="modal"
                                data-bs-target="#gallery">
                                <img src="{{ "$image->url" }}" />
                            </div>
                        @endif
                        @if ($index == 3)
                            <div class="post position-relative more" data-index={{ $index }} data-bs-toggle="modal"
                            data-bs-target="#gallery">
                                <img class="" src="{{ "$image->url" }}" class="post" />
                                <span class="position-absolute top-50 start-50 translate-middle text-white fs-5">
                                    +{{ count($work->images) - 3 }}
                                </span>
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>

                <h3>{{ $work->user->name }}
                    {{ \Carbon\Carbon::parse($work->created_at)->format('d/m/Y') }}</h3>
                <div class="box-comment">
                    <div class="star1">
                        <form id="rate" class="" action="{{ route('rating.create', $work) }}" method="POST"
                            autocomplete="off">
                            @csrf

                            <input type="hidden" value="{{ !empty($rating) ? $rating->id : '' }}" name="id">
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
                        <h5>{{ count($work->comments) }}</h5>
                    </div>
                </div>

                {{-- <div class="bookmark">
                        <i class="fa-regular fa-bookmark"></i>
                    </div> --}}
                <div class="line1">
                    <hr>
                </div>
                <form id="form-create-comment" action="{{ route('comment.create', $work->id) }}" method="post">
                    @csrf
                    <div class="py-4">
                        <div class="row">
                            <div class="col-auto">
                                <img class="avatar"
                                    src="{{ $work->user->image ? $work->user->image : $work->user->profile_photo_url }}"
                                    alt="">
                            </div>
                            <div class="col">
                                <textarea placeholder="Post your comment" class="form-control border-0" name="comment" id=""
                                    rows="3"></textarea>
                            </div>
                            <div class="col-auto align-self-end">
                                <button class="btn btn-primary rounded-pill px-4 d-md-block d-none"
                                    id="create-comment-btn">Post</button>
                                <button class="btn btn-primary rounded-pill d-block d-md-none"><i
                                        class="fa-regular fa-paper-plane"></i></button>
                            </div>
                        </div>
                        <div class="line1">
                            <hr>
                        </div>
                    </div>
                </form>
                @foreach ($work->comments as $comment)
                    <div id="comment-{{ $comment->id }}">
                        <div class="row">
                            <div class="col-auto">
                                <img class="avatar"
                                    src="{{ $comment->user->image ? $comment->user->image : $comment->user->profile_photo_url }}"
                                    alt="">
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <h1 class="p-0 mb-2">{{ $comment->user->name }}</h1>
                                    @if (Auth::user()->id === $work->user->id)
                                        <div class="dropdown">
                                            <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis text-black small"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item edit-comment-btn"
                                                        data-id="{{ $comment->id }}">Edit</button></li>
                                                <li>
                                                    <form action="{{ route('comment.destroy', $work->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="button"
                                                            class="dropdown-item fs-5 delete-comment-btn"
                                                            data-id="{{ $comment->id }}">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <h2 class="p-0 mb-3">{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}
                                </h2>
                                <h3 id="comment-text-{{ $comment->id }}" class="p-0 mb-0 comment-text">
                                    {{ $comment->comment }}</h3>
                                <form id="form{{ $comment->id }}" class="edit-comment-form d-none">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <textarea class="form-control" name="comment" id="{{ $comment->id }}}" rows="3">{{ $comment->comment }}</textarea>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-primary update-comment-btn"
                                                data-id="{{ $comment->id }}">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="line1">
                            <hr>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
        <div class="modal fade" id="gallery" tabindex="-1" aria-labelledby="galleryLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content  bg-transparent">
                    <div class="modal-body">
                        <div class="container">
                            <div class="text-end mb-5">
                                <button type="button" class="btn-close fs-3" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="swiper mySwiper h-75">
                            <div class="swiper-wrapper">
                                @forelse ($work->images as $image)
                                    <div class="swiper-slide h-100">
                                        <div class="container d-flex align-items-center justify-content-center w-100 h-100">
                                            <img class="object-fit-contain img-fluid h-100" src="{{ $image->url }}">
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="swiper-button-next text-white">
                            </div>
                            <div class="swiper-button-prev text-white"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.post').on('click', function() {
                console.log($(this).data('index'));
                var index = parseInt($(this).data('index'));
                swiper.slideTo(index);
            });
        });
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

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
        $(document).ready(function() {
            // เมื่อคลิกปุ่ม Edit
            $('.edit-comment-btn').on('click', function() {
                const commentId = $(this).data('id');
                console.log($(this).data('id'));
                $(`#comment-text-${commentId}`).addClass('d-none');
                $(`#form${commentId}`).removeClass('d-none');
            });

            // เมื่อคลิกปุ่ม Save
            $('.update-comment-btn').on('click', function() {
                const commentId = $(this).data('id');
                const $form = $(`#form${commentId}`);
                const formData = $form.serialize(); // รวบรวมข้อมูลจากฟอร์ม

                $.ajax({
                    url: `/comment/update/${commentId}`,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            const newComment = $form.find('textarea[name="comment"]').val();
                            $(`#comment-text-${commentId}`).text(newComment);
                            $form.addClass('d-none');
                            $(`#comment-text-${commentId}`).removeClass('d-none');
                        } else {
                            alert('Failed to update comment.');
                        }
                    },
                    error: function(e) {}
                });
            });

            // เมื่อคลิกปุ่ม Delete
            $('.delete-comment-btn').on('click', function() {
                const commentId = $(this).data('id');
                const $form = $(`#form${commentId}`);
                const formData = $form.serialize(); // รวบรวมข้อมูลจากฟอร์ม

                $.ajax({
                    url: `/comment/destroy/${commentId}`,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $(`#comment-${commentId}`).remove();
                        } else {
                            alert('Failed to delete comment.');
                        }
                    },
                    error: function(e) {}
                });
            });
        });
    </script>
    {{-- 
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
    </script> --}}
    {{-- 
    <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
    </script> --}}

    {{-- <script>
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
    </script> --}}
@endsection
