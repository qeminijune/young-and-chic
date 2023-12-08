@extends('layouts.main')
@section("head")
<link rel="stylesheet" type="text/css" href="{{asset("css/job.css")}}">
@endsection
@section('head')
    <style>
        #job {
            position: absolute;
            bottom: 15px;
            right: 0;
        }

        .dropdown {
            margin: -6px 10px;
        }

        .py-1 {
            width: 220px;
            height: 40px;
            background-color: #f4f4f4;
            color: black;
            padding: 10px;
            font-size: 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            /* margin-top: 20px; */
            font-family: "Gentium Book Basic", sans-serif;
        }

        .py-1:hover,
        .py-1:focus {
            background-color: #960021;
            color: white;
        }

        .box {
            position: relative;
            max-width: 1211px;
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <section>
        <div class="banner">
            <img src="images/banner-job.jpg">
        </div>

        <div class="freelance">
            <h1>Freelance</h1>
            <p>Full-Time</p>
            <hr>
        </div>

        <form action="/jobshow" method="GET">
            <div class="box">
                {{-- <input id="search-job" type="text" name="search" placeholder="Search jobs by keyword... " /> --}}
                {{-- <i class="fas fa-search"></i> --}}
                <input id="search-job" placeholder="Search for teams..." type="text" name="search"
                    value="{{ Request::get('search') }}" />
                {{-- class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-l py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
            placeholder="Search for anything..." --}}
                <span class="dropdown" id="job">

                    <select id="filter" class="py-1 border-slate-300 border-s-0 rounded-r" name="filter"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <option {{ Request::get('filter') == '' ? 'selected' : '' }} value="">All Team</option>
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
                </span>
            </div>
        </form>
    </section>

    <section>
        <div class="container">
            <h3 class="title">Freelance Jobs</h3>
            @if (Auth::user()->type_user == 'designer')
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
                                            @csrf
                                            <div id="step1" class="content" role="tabpanel"
                                                aria-labelledby="step1-trigger">
                                                <label class="form-label" for="upload_image_background">Upload Related
                                                    Images</label>
                                                <fieldset class="upload_dropZone text-center mb-3 p-4">
                                                    <legend class="visually-hidden">Image uploader</legend>
                                                    <svg class="upload_svg" width="60" height="60"
                                                        aria-hidden="true">
                                                        <use href="#icon-imageUpload"></use>
                                                    </svg>
                                                    <p class="small my-2">Drag &amp; Drop background image(s) inside dashed
                                                        region<br><i>or</i></p>
                                                    <input id="upload_image_background" name="image"
                                                        data-post-name="image_background"
                                                        data-post-url="https://someplace.com/image/uploads/backgrounds/"
                                                        class="position-absolute invisible" type="file" multiple
                                                        accept="image/jpeg, image/png, image/svg+xml"
                                                        value="{{ old('image') }}" />

                                                    <label class="btn btn-upload mb-3" for="upload_image_background">Choose
                                                        file(s)</label>
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

                                                <div class="row justify-content-end">
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
                                                        Hair Stylist (ช่างทำผม)</option>
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
                                                <label class="form-label" for="full_description">Full Description</label>
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
                <div class="button">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Post A Job
                    </button>
                </div>
            @endif
        </div>

        <div class="container">
            <div class="products-container">
                @forelse ($jobs as $job)
                    <div class="product" data-name="p-1">
                        <img src="/images/{{ $job->image }}" alt="">
                        <h3>{{ $job->participants }}</h3>
                        <div class="price">{{ $job->type }}</div>
                        <h4>{{ $job->employment }}</h4>
                        <h5>{{ $job->description }}</h5>
                        <h6>{{ $job->full_description }}</h6>
                        @if (Auth::user()->type_user == 'participant')
                            <div class="row justify-content-between">
                                <div class="col-auto1">
                                    <a href="{{ route('apply', $job->id) }}" class="apply btn" type="button">Apply</a>
                                </div>
                                <div class="col-auto1">
                                    <button class="save btn" type="button">Save for later</button>
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                @endforelse
            </div>
        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // const myModal = document.getElementById('myModal')
        // const myInput = document.getElementById('myInput')

        // myModal.addEventListener('shown.bs.modal', () => {
        //     myInput.focus()
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
    <script src="{{ asset('js/upload.js') }}"></script>
@endsection
