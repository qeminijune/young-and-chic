@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/job.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}"> --}}
@endsection
@section('head')
    <link rel="stylesheet" href="sweetalert2.min.css">
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    {{-- <section>
        <label for="toggle-2" class="toggle-2">
            <input type="checkbox" name="toggle-2" id="toggle-2" class="toggle-2__input">
            <span class="toggle-2__button">
                <img src="https://raw.githubusercontent.com/nueymoo/toggle-switch-css/master/sun.png" alt="sun"
                    class="toggle-2__button--icon">
                <i class="fa-solid fa-list"></i>
            </span>
        </label>
    </section> --}}

    <section>
        <div class="banner"></div>
        <div class="container">
            <form action="/jobshow" method="GET">
                <div class="box-search">
                    <div class="input-group mb-3 search-filter">
                        <input class="form-control" id="search-job" placeholder="Search for teams..." type="text"
                            name="search" value="{{ Request::get('search') }}" />
                        <select id="filter" class="ftjob py-1 border-slate-300 border-s-0 rounded-r" name="filter"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <option {{ Request::get('filter') == '' ? 'selected' : '' }} value="">All Role
                                Participants</option>
                            <option {{ Request::get('filter') == 'model' ? 'selected' : '' }} value="model">Model
                            </option>
                            <option {{ Request::get('filter') == 'photographer' ? 'selected' : '' }} value="photographer">
                                Photographer
                            </option>
                            <option {{ Request::get('filter') == 'makeup' ? 'selected' : '' }} value="makeup">Makeup
                            </option>
                            <option {{ Request::get('filter') == 'hair' ? 'selected' : '' }} value="hair">Hair Stylist
                            </option>
                            <option {{ Request::get('filter') == 'tailor' ? 'selected' : '' }} value="tailor">Tailor
                            </option>
                            {{-- <option {{ Request::get('filter') == 'designer' ? 'selected' : '' }} value="designer">designer
                                </option> --}}
                        </select>
                    </div>
                </div>
            </form>
            <div class="namepage">
                <!-- VIEW SWITCHER -->
                {{-- <div id="switchbtn">
                    <button onclick="document.getElementById('demo').className=''">&#8862;</button>
                    <button onclick="document.getElementById('demo').className='grid'">&#8863;</button>
                </div> --}}
                {{-- <h3 class="title">Freelance Jobs</h3> --}}

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#step1">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="step1"
                                                id="step1-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                {{-- <span class="bs-stepper-label">Logins</span> --}}
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step2">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="step2"
                                                id="step2-trigger">
                                                <span class="bs-stepper-circle">2</span>

                                                {{-- <span class="bs-stepper-label">Various information</span> --}}
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step3">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="step3"
                                                id="step3-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                {{-- <span class="bs-stepper-label">Various information</span> --}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <!-- your steps content here -->
                                        <form action="{{ route('jobshow.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            <div class="head-postjob">
                                                <p>Post a job for find participants</p>
                                            </div>
                                            @csrf
                                            <div id="step1" class="content" role="tabpanel"
                                                aria-labelledby="step1-trigger">
                                                <label class="form-label" for="upload_image_background">Upload Cover
                                                    Images</label>
                                                <div class="chooseimg">
                                                    <h5>*File size does not exceed 2 MB.</h5>
                                                </div>
                                                <fieldset class="upload_dropZone text-center mb-3 p-4">
                                                    <legend class="visually-hidden">Image uploader</legend>
                                                    <svg class="upload_svg" width="60" height="60"
                                                        aria-hidden="true">
                                                        <use href="#icon-imageUpload"></use>
                                                    </svg>
                                                    <p class="small my-2">Drag &amp; Drop background image(s) inside
                                                        dashed
                                                        region<br><i>or</i></p>
                                                    <input id="upload_image_background" name="image"
                                                        data-post-name="image_background"
                                                        data-post-url="https://someplace.com/image/uploads/backgrounds/"
                                                        class="position-absolute invisible" type="file" multiple
                                                        accept="image/jpeg, image/png, image/svg+xml"
                                                        value="{{ old('image') }}" />

                                                    <label class="btn btn-upload mb-3" for="upload_image_background">Choose
                                                        Image(s)</label>
                                                    <div
                                                        class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0">
                                                    </div>
                                                </fieldset>
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                                <svg style="display:none">
                                                    <defs>
                                                        <symbol id="icon-imageUpload" clip-rule="evenodd"
                                                            viewBox="0 0 96 96">
                                                            <path
                                                                d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z" />
                                                        </symbol>
                                                    </defs>
                                                </svg>

                                                <div class="row justify-content-between">
                                                    <div class="col-auto">
                                                        <a href="{{ route('jobshow') }}">cancel</a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="next btn" type="button">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step2" class="content" role="tabpanel"
                                                aria-labelledby="step2-trigger">
                                                <h1>Job Detail</h1>
                                                <label class="form-label" for="participant">Participant Field</label>
                                                <select id="participant" name="participant" class="form-select mb-4"
                                                    aria-label="Default select example">
                                                    <option selected value=""
                                                        {{ old('participant') == '' ? 'selected' : '' }}></option>
                                                    <option value="photographer"
                                                        {{ old('participant') == 'photographer' ? 'selected' : '' }}>
                                                        Photographer (ช่างภาพ)
                                                    </option>
                                                    <option value="makeup"
                                                        {{ old('participant') == 'makeup' ? 'selected' : '' }}>Makeup
                                                        (ช่างแต่งหน้า)
                                                    </option>
                                                    <option value="model"
                                                        {{ old('participant') == 'model' ? 'selected' : '' }}>
                                                        Model (นางแบบ)</option>
                                                    {{-- <option value="designer"
                                            {{ old('participant') == 'designer' ? 'selected' : '' }}>Designer
                                            (นักออกแบบ)
                                        </option> --}}
                                                    <option value="tailor"
                                                        {{ old('participant') == 'tailor' ? 'selected' : '' }}>Tailor
                                                        (ช่างตัดเย็บ)
                                                    </option>
                                                    <option value="hair"
                                                        {{ old('participant') == 'hair' ? 'selected' : '' }}>
                                                        HairStylist (ช่างทำผม)</option>
                                                </select>
                                                @if ($errors->has('participant'))
                                                    <div class="text-danger">{{ $errors->first('participant') }}</div>
                                                @endif
                                                <label class="form-label" for="type">Type</label>
                                                <select id="type" name="type" class="form-select mb-4"
                                                    aria-label="Default select example">
                                                    <option selected value=""
                                                        {{ old('type') == '' ? 'selected' : '' }}>
                                                    </option>
                                                    <option value="freelance"
                                                        {{ old('type') == 'freelance' ? 'selected' : '' }}>Freelance
                                                    </option>
                                                    <option value="full" {{ old('type') == 'full' ? 'selected' : '' }}>
                                                        Full
                                                        Time</option>
                                                </select>
                                                @if ($errors->has('type'))
                                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                                @endif
                                                <div class="row justify-content-between">
                                                    <div class="col-auto">
                                                        <button class="prev btn" type="button">Previous</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="next btn" type="button">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step3" class="content" role="tabpanel"
                                                aria-labelledby="step3-trigger">
                                                <h1>Public Post</h1>
                                                <label class="form-label" for="employment">Employment Type</label>
                                                <select id="employment" name="employment" class="form-select mb-4"
                                                    aria-label="Default select example">
                                                    <option selected value=""
                                                        {{ old('employment') == '' ? 'selected' : '' }}></option>
                                                    <option value="remote"
                                                        {{ old('employment') == 'remote' ? 'selected' : '' }}>Online
                                                    </option>
                                                    <option value="onsite"
                                                        {{ old('employment') == 'onsite' ? 'selected' : '' }}>Onsite
                                                    </option>
                                                </select>
                                                @if ($errors->has('employment'))
                                                    <span class="text-danger">{{ $errors->first('employment') }}</span>
                                                @endif
                                                <label class="form-label" for="description">Short Description</label>
                                                <input class="form-control mb-4" id="description" type="text"
                                                    name="description" placeholder="Ex: Looking for ..."
                                                    value="{{ old('description') }}" />
                                                @if ($errors->has('description'))
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                                <label class="form-label" for="full_description">Full
                                                    Description</label>
                                                <textarea class="form-control mb-4" id="full_description" type="text" name="full_description" placeholder="... "
                                                    value="{{ old('full_description') }}"></textarea>
                                                <div class="row justify-content-between">
                                                    <div class="col-auto">
                                                        <button class="prev btn" type="button">Previous</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="next btn" type="submit">Post a team</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="d-none d-lg-block col-2"></div>
                    <p class="title-job text-lg-center col mb-0">Job announcement board ({{ count($jobs) }})</p>
                    <div class="col-auto @if (Auth::user()->type_user != 'designer') col-lg-2 @endif">
                        @if (Auth::user()->type_user == 'designer')
                            <button class="btn btn-outline-primary rounded-pill border-2 fw-bold" type="button"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Post a Job
                            </button>
                        @endif
                    </div>

                </div>

            </div>
        </div>

        <!-- (A) ITEMS LIST/GRID -->
        {{-- <ul id="demo">
            <li>
                <div class="container-custom">
                    <div class="products-container">
                        @forelse ($jobs as $job)
                            <div class="product" data-name="p-1">
                                <img src="/images/{{ $job->image }}" alt="">
                                <div class="find-role">
                                    <p>Find</p>
                                    <a href="{{ route('jointeam', $job->id) }}">
                                        <h3>{{ $job->participants }}</h3>
                                    </a>
                                </div>
                                <div class="type">
                                    <p>Type</p>
                                    <div class="price">{{ $job->type }}</div>
                                </div>
                                <div class="em-type">
                                    <p>Employment Type</p>
                                    <h4>{{ $job->employment }}</h4>
                                </div>
                                <p>Looking For...</p>
                                <h5>{{ $job->description }}</h5>
                                <h6>{{ $job->full_description }}</h6>
                                @if (Auth::user()->type_user == 'participant')
                                    <div class="d-none d-md-flex row justify-content-between">
                                        <div class="col-auto1">
                                            <a href="{{ route('apply', $job->id) }}" class="apply btn"
                                                type="button">Apply</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </li>
        </ul> --}}

        <div class="container">
            <div class="row gy-4">
                @foreach ($jobs as $job)
                    <div class="col-md-4 col-lg-3">
                        <div href="{{ route('jointeam', $job->id) }}" class="text-decoration-none text-dark">
                            <div class="card-product d-flex flex-sm-column justify-content-center">
                                <img class="card-product-image" src="/images/{{ $job->image }}" alt="">
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
                                                <button data-id="{{ $job->id }}"
                                                    class="apply btn btn-primary rounded-pill">Apply</button>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div> --}}

        <script>
            $(document).ready(() => {
                $("#photo1").change(function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(event) {
                            console.log(event.target.result)
                            $("#label-photo1").html(`<img src="${event.target.result}"/>`)

                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>

    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // const myModal = document.getElementById('myModal')
        // const myInput = document.getElementById('myInput')

        // myModal.addEventListener('shown.bs.modal', () => {
        //     myInput.focus()
        // })
        // $(document).ready(function() {
        //     $('.apply').click(function(event) {
        //         // Stop propagation of the click event
        //         event.stopImmediatePropagation();
        //     });
        // })

        $(document).ready(function() {
            var stepper = new Stepper($('.bs-stepper')[0])
            // stepper.next()
            $('.next').click(() => {
                stepper.next()
            })
            $('.prev').click(() => {
                stepper.previous()
            })
        })
    </script>
    <script type="text/javascript">
        @if (count($errors) > 0)
            $(window).on('load', function() {
                $('#exampleModal').modal('show');
            });
        @endif
    </script>
    <script>
        $(document).ready(function(event) {
            $(".apply").on("click", function(event) {
                event.stopPropagation();
                $id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, apply it!',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-danger",
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/apply/${$id}`;
                    }
                })
            })
        })
    </script>
    <script src="{{ asset('js/upload.js') }}"></script>
@endsection
