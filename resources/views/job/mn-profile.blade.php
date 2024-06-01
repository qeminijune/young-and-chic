@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mn-profile.css') }}">
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
            <form action="{{ route('mn.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="manage">
                    <label for="bg">
                        <div class="bg" id="label-bg">
                            <div class="upload">
                                <img src="{{ $user->bg ? $user->bg : asset('images/bg-create-pic.png') }}">
                            </div>
                        </div>
                    </label>
                    <input style="display: none;" type="file" name="bg" id="bg">
                    <input style="display: none;" type="file" name="image" id="profile">

                    {{-- <form action="upload.php" method="post" enctype="multipart/form-data">
                            <label for="fileToUpload">
                          <div class="profile-pic" style="background-image: url('https://randomuser.me/api/portraits/med/men/65.jpg')">
                              <span class="fas fa-camera"></span>
                              <span>Change Image</span>
                          </div>
                          </label>
                          <input type="File" name="fileToUpload" id="fileToUpload">
                        </form> --}}
                    @error('bg')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="wrap-form-manage">
                        <label for="profile">
                            <div class="pf13" id="label-profile">
                                <div class="upload">
                                    <img class="pic"
                                        src="{{ $user->image ? $user->image : asset('images/bg-create-pic.png') }}">
                                </div>
                            </div>
                        </label>
                        <div class="wrap-input mb-4">
                            <label for="name">Name</label>
                            <input class="input-manage" type="text" id="name" name="name"
                                value="{{ old('name') ? old('name') : $user->name }}" placeholder="Enter your name...">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="wrap-input mb-4">
                            <label for="email">Email</label>
                            <input class="input-manage" type="text" id="email" name="email"
                                value="{{ old('email') ? old('email') : $user->email }}"
                                placeholder="Enter email address...">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="wrap-input mb-4">
                            <label for="tel">Tel.</label>
                            <input class="input-manage" type="text" id="tel" name="tel"
                                value="{{ old('tel') ? old('tel') : $user->tel }}" placeholder="Enter your number...">
                            @error('tel')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="wrap-input mb-4">
                            <label for="address">Address.</label>
                            <input class="input-manage" type="text" id="address" name="address"
                                value="{{ old('address') ? old('address') : $user->address }}"
                                placeholder="Enter address number...">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="wrap-input mb-4">
                            <label for="birthday">Birthday</label>
                            <input class="input-manage" type="date" id="birthday" name="birthday"
                                value="{{ old('birthday') ? old('birthday') : $user->birthday }}">
                            @error('birthday')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="d-block mx-auto ms-md-auto me-md-0" type="submit" id="submit" value="Save">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            $("#profile").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#label-profile").html(
                            `<div class="upload" data-label="profile"><img class="pic" src="${event.target.result}"/></div>`
                        )
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $("#bg").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#label-bg").html(
                            `<div class="upload" data-label="profile"><img src="${event.target.result}"/></div>`
                        )
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
